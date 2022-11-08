<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="profile.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Will - Trainers</title>
</head>
<body>
    <?php 
    include 'sql_func.php';
?>
<nav>
    <ul class="nav__link">
        <li class="nav__item"><a href="./index.html">Home</a></li>
        <li class="nav__item"><a href="profile.php" >Profile</a></li>
        <li class="nav__item"><a href="trainers.php">Trainers</a></li>
        <li class="nav__item"><a href="centers.php" >Centers</a></li>
        <li class="nav__item"><a href="exercises.php" class="active" >Exercises</a></li>
        <li class="nav__item right-end"><a href="logout.php">Logout</a></li>
    </ul>
</nav>

</body>
</html>