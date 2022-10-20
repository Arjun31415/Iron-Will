<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // send forbidden
    header("HTTP/1.0 403 Forbidden");
    die();
}
try {
    
    // validate form data
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $fullName       = $_POST['fullName'];
    $phoneNo        = $_POST['phoneNo'];
    $repeatPassword = $_POST['repeatPassword'];
    
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
        $sql = "INSERT INTO User (id, email, password, name, phone) VALUES ($id,'$email', '$hashedPassword', '$fullName', '$phoneNo')";
    
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
}

catch (Exception $e) {
    // redirect to register page with error message
    echo "Error: " . $e->getMessage();
    die();
}


?>