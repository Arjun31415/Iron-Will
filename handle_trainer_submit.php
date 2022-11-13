<?php
include 'sql_func.php';
session_start();

// handle post request to store trainer allocated to the person
// check if request type is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // check if the form is submitted
    if (isset($_POST['trainer'])) {
        // get the trainer id
        $trainer_id = $_POST['trainer'];
        // set trainer id in Allocation table where u_id is the current user id
        $sql = "UPDATE Allocation SET t_id = '$trainer_id' WHERE u_id = '$_SESSION[uid]'";
        query_table($sql);
    }
    // redirect to profile page with success message
    header("Location: profile.php?success=1");
}
?>