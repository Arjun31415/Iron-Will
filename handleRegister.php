<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // send forbidden
    header("HTTP/1.0 403 Forbidden");
    die();
}

try {

    // convert data to string
    $email = (string)$email;
    $password = (string)$password;
    $fullName = (string)$fullName;
    $phoneNo = (string)$phoneNo;
    $repeatPassword = (string)$repeatPassword;
    $gender = (string)$gender;
    
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $fullName = $_POST['fullName'];
    $phoneNo = $_POST['phoneNo'];
    $repeatPassword = $_POST['repeatPassword'];
    $gender = strtolower($_POST['gender']);
    
    


    // check if gender is either 'm' or 'f' else return back with error
    if ($gender != 'm' && $gender != 'f') {
        header("Location: Register.php?error:Enter 'm' or 'f' for Gender");
        die();
    }

    // check if passwords are same
    if ($password != $repeatPassword) {
        // redirect to register page  with error message
        header("Location: Register.php?error=Passwords do not match");
        die();
    }

    //validate email 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // redirect to register page  with error message
        header("Location: Register.php?error=Invalid Email");
        die();
    }

    //validate fullName
    if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
        // redirect to register page  with error message
        header("Location: Register.php?error=Invalid Full Name");
        die();
    }

    //validate phoneNo 
    if (!preg_match("/^[0-9]*$/", $phoneNo)) {
        // redirect to register page  with error message
        header("Location: Register.php?error=Invalid Phone Number");
        die();
    }

    // check if password is strong
    if (strlen($password) < 8) {
        // redirect to register page  with error message
        header("Location: Register.php?error=Password is less than 8 characters");
        die();
    }

    // include php file
    include 'sql_func.php';

    // Generate random 5-digit values for x_coord and y_coord
    $x_coord = rand(0, 99999);
    $y_coord = rand(0, 99999);
    // get the list of all coordinates of centers from database
    $sql = "SELECT x_coord,y_coord,id FROM Center";
    $result = query_table($sql);

    $center_id = -1;
    // assign it to int max
    $min_distance = PHP_INT_MAX;

    foreach ($result as $row) {
        // find the nearest center
        // parse it as int
        $x = intval($row['x_coord']);
        $y = intval($row['y_coord']);
        $distance = sqrt(pow($x - $x_coord, 2) + pow($y - $y_coord, 2));
        if ($distance < $min_distance) {
            $min_distance = $distance;
            $center_id = $row['id'];
        }
    }
    // assert that center_id is not -1
    assert($center_id != -1);
    // hash password with bcrypt algorithm
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    if (!user_exists($email)) {

        // generate a 6 digit number
        $id = rand(100000, 999999);
        // check if id already exists in User table
        while (id_exists($id)) {
            $id = rand(100000, 999999);
        }

        // insert user into database
        $sql = "INSERT INTO User (id, email, password, name , phone, gender, x_coord, y_coord) 
        VALUES ('$id', '$email', '$hashedPassword', '$fullName', '$phoneNo', '$gender', '$x_coord', '$y_coord')";
        insert_into_table($sql);

        $sql = "INSERT INTO Allocation (c_id,u_id) VALUES('$center_id','$id')";
        insert_into_table($sql);

        //describe user table
        $sql = "Select * from User";
        describe_table($sql);

        // redirect to login page with success message
        header("Location: Login.php?success=Account Created Successfully");
        die();
    } else {
        // redirect to register page  with error message
        header("Location: Register.php?error=Email already exists");
        die();
    }
} catch (Exception $e) {
    // redirect to register page with error message
    echo "Error: " . $e->getMessage();
    die();
}

?>