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
    <section>
        <?php
        // create dummy centers array with location, active hours, emails, PhNo, and trainer
        $centers = array(
            array(
                "location" => "Gurgaon",
                "hours" => "8:00 AM - 8:00 PM",
                "email" => "iron.will.gurgaon@example.com",
                "PhNo" => "9876543210",
            ),
            array(
                "location" => "Delhi",
                "hours" => "9:00 AM - 9:00 PM",
                "email" => "iron.will.delhi@gmail.com",
                "PhNo" => "9876543211",
            ),
            array(
                "location" => "Noida",
                "hours" => "10:00 AM - 10:00 PM",
                "email" => "iron.will.Noida@gmail.com",
                "PhNo" => "9876543212",
            ),
            array(
                "location" => "Faridabad",
                "hours" => "11:00 AM - 11:00 PM",
                "email" => "iron.will.faridabad@gmail.com",
                "PhNo" => "9876543213",
            ),
        );
        function generateCenterCard($center)
        {
            $card = "<div class='item'> 
            <div class='details'>
            <h1>" .
                $center['location'] .
                "</h1> 
                    <p>" . $center['PhNo'] .
                "</p>
                    <p>Hours: " .
                $center["hours"] . "</p><p>" .
                $center["email"] . "</p></div></div>";
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