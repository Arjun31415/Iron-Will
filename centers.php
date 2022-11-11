<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="nav_bar.css" />
    <link rel="stylesheet" href="centers.css" />
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
            <li class="nav__item"><a href="profile.php">Profile</a></li>
            <li class="nav__item"><a href="trainers.php">Trainers</a></li>
            <li class="nav__item"><a href="centers.php" class="active">Centers</a></li>
            <li class="nav__item"><a href="exercises.php">Exercises</a></li>
            <li class="nav__item right-end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="title">Our Centers</div>
    <div class="buttons">
        <button class="list-view on"><i class="fa fa-bars"></i></button>
    </div>
    <section>
        <?php

        $sql = "SELECT * FROM Center";
        $result = query_table($sql);

        // make a trainer associative array with name,center assigned,phNo,gender,email from sql result
        $centers = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $centers[] = array(
                "location" => $row['location'],
                "hours" => $row['active_hours'],
                "PhNo" => $row['phone'],
                "email" => $row['email'],
                "image" => $row['image'],
            );
        }

        function generateCenterCard($center)
        {
            $card = "<div class='item'> 
            <div class='details'>
            <div class='image'>
            <img class=\"round\" src={$center['image']} alt=\"user\" />   
            </div>
            <div class='details_text'> 
            <h1>" .
                $center['location'] .
                "</h1> 
                    <p>Phone Number : " . $center['PhNo'] .
                "</p>
                    <p>Active Hours: " .
                $center["hours"] . "</p><p>Email : " .
                $center["email"] . "</p></div></div> </div>";
            return $card;
        }
        // generate cards for each center
        echo "<div class=\"wrapper list\">";
        foreach ($centers as $center) {
            echo generateCenterCard($center);
        }
        echo "</div>";

        ?>
    </section>

</body>

</html>