<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="trainers.css" />
    <link rel="stylesheet" href="nav_bar.css" />
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
            <li class="nav__item"><a href="profile.php">Profile</a></li>
            <li class="nav__item"><a href="trainers.php" class="active">Trainers</a></li>
            <li class="nav__item"><a href="centers.php">Centers</a></li>
            <li class="nav__item"><a href="exercises.php">Exercises</a></li>
            <li class="nav__item right-end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <br>
    <br>

    <div class="title">Our Trainers</div>
    <div class="buttons">
        <button class="list-view on"><i class="fa fa-bars"></i></button>
    </div>
    <div class="wrapper list">
        <?php
        // create a dummy trainer associative array with name,center assigned,phNo,gender,email
        $trainers = array(
            array("name" => "Trainer 1", "center" => "Center 1", "phNo" => 123456789, "gender" => 'M', "email" => "isuck@example.com"),
            array("name" => "Trainer 2", "center" => "Center 2", "phNo" => 123456789, "gender" => 'F', "email" => "booboo@example.com"),
            array("name" => "Trainer 3", "center" => "Center 3", "phNo" => 123456789, "gender" => 'M', "email" => "123@vit.com"),
            array("name" => "Trainer 4", "center" => "Center 4", "phNo" => 123456789, "gender" => 'F', "email" => "aaaa@example.com")
        );
        // create a function to display trainer details
        function generateTrainerDetails($trainer)
        {
            $img=$trainer['gender']=='M'?'https://randomuser.me/api/portraits/men/13.jpg':'https://randomuser.me/api/portraits/women/5.jpg';
            $div = "<div class='item'>
            <div class='image'>
            <img class=\"round\" src=$img alt=\"user\" />   
            </div>
        <div class='details'>
        <h2>" . $trainer['name'] . "</h2>
        <p> Phone No: " . $trainer['phNo'] . "</p> <p>Email: " . $trainer['email'] . "</p>
        <p>Center: " . $trainer['center'] . "</p>
        </div>
        </div>";
            return $div;
        }
        // display all trainers
        foreach ($trainers as $trainer) {
            echo generateTrainerDetails($trainer);
        }
        ?>
    </div>

</body>

</html>