<?php
    session_start();
    // check if request type is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        print_r($_SESSION);
    echo "<br>";
        include 'sql_func.php';    
        // set the t_id field in Allocation table to null for the current user
        $sql = "UPDATE Allocation SET t_id = NULL WHERE u_id = '$_SESSION[uid]'";
        print_r($sql);
        query_table($sql);
    }
    // redirect to profile page with success message
    header("Location: profile.php");
    
?>