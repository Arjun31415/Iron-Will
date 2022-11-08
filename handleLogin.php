<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // send forbidden
    header("HTTP/1.0 403 Forbidden");
    die();
}
    try
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //validate email 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // redirect to register page  with error message
            header("Location: Login.php?error=Invalid Email");
            die();
        }

        include 'sql_func.php';
        // check if user exist in database using email
        // if user exist then check password
        // if password is correct then send success else send error
        if(user_exists($email)){
            if(check_password_match($email, $password)){
                // send success
                echo "User in database";

                // start user session
                $_SESSION['email'] = $email;   
                $_SESSION['name'] = get_name($email);     
                header("Location: profile.php");
                die();
            }else{
                // send error
                header("Location: Login.php?error=email or password is incorrect");
                die();
            }
        }
        
    }
    catch (Exception $e)
    {
        // redirect to register page  with error message
        echo "Error: " . $e->getMessage();
        die();
    }

?>