<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Will - Profile</title>
</head>
<body>
    <?php 

    include 'sql_func.php';

    print_r($_SESSION);
?>
<?php

    echo "<h1> Welcome To the family: ". $_SESSION['name'] ."</h1>";
?>
</body>
</html>