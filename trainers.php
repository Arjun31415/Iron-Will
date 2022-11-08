<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="trainers.css" />
    <link rel="stylesheet" href="profile.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <li class="nav__item"><a href="trainers.php" class="active">Trainers</a></li>
        <li class="nav__item"><a href="centers.php" >Centers</a></li>
        <li class="nav__item"><a href="exercises.php" >Exercises</a></li>
        <li class="nav__item right-end"><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<br>
<br>

<div class="title">A Simple List/Grid Toggle</div>
<div class="buttons">
  <button class="list-view on"><i class="fa fa-bars"></i></button>
</div>
<div class="wrapper list">
    <?php
    
    $div = '<div class="item">
                <div class="details">
                    <h2>Gretsch Catalina Club Jazz</h2><span>Yours for only <span class="price">$599.99</span>
                    </span><p>What a classic kit! Available in several great colors, including Natural (shown), Walnut Glaze, White Marine, Copper Sparkle, and Black Galaxy. Every drummer needs one of these.</p>
                </div>
            </div>';
    echo $div;
    echo $div;
    echo $div;

    ?>
</div>


</body>
</html>