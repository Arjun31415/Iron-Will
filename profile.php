<?php
session_start();

if ($_SESSION['email'] == NULL) {
    header('Location: Register.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="nav_bar.css" />
    <link rel="stylesheet" href="card.css" />
    <link rel="stylesheet" href="trainer.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Will - Profile</title>
</head>

<body>
    <?php
    include 'sql_func.php';
    ?>
    <nav>
        <ul class="nav__link">
            <li class="nav__item"><a href="./index.html">Home</a></li>
            <li class="nav__item"><a href="profile.php" class="active">Profile</a></li>
            <li class="nav__item"><a href="trainers.php">Trainers</a></li>
            <li class="nav__item"><a href="centers.php">Centers</a></li>
            <li class="nav__item right-end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="master_container">
        <div class="card-container">

            <?php

            // get user information from session uid table
            $sql = "SELECT * FROM User WHERE id = {$_SESSION['uid']}";
            $result = query_table($sql);

            while ($row = mysqli_fetch_assoc($result)) {
                //  read user datails from sql result
                $user = array(
                    "name" => $row['name'],
                    "email" => $row['email'],
                    "phone" => $row['phone'],
                    "gender" => $row['gender'],
                );

            }

            $rand = rand(0, 99);
            $user['image'] = $user['gender'] == 'm' ? 'https://randomuser.me/api/portraits/men/' . $rand . '.jpg' : 'https://randomuser.me/api/portraits/women/' . $rand . '.jpg';

            echo "<img class='round' src=\"{$user['image']}\"/>
            <h3>{$user['name']}</h3>
            <h6>Trainee</h6>
            <p>Email : {$user['email']} <br>Phone : {$user['phone']}</p>";

            // get user allocated center id from allocation table
            $sql = "SELECT c_id,t_id from Allocation where u_id = " . $_SESSION['uid'];
            $result = query_table($sql);
            // get cid from sql result
            while ($row = mysqli_fetch_assoc($result)) {
                $cid = $row['c_id'];
                $tid = $row['t_id'];
            }
            echo ($tid == NULL ? "<p>Not allocated to any trainer</p>" : "");

            $sql = "SELECT * from Center where id = " . $cid;
            $center = query_table($sql);

            while ($row = mysqli_fetch_assoc($center)) {
                // store results in associative array
                $center_details = array("location" => $row['location'], "image" => $row['image'], "email" => $row['email'], "phone" => $row['phone']);
            }

            function generateTrainerDetails($trainer)
            {
                $rand = rand(0, 99);
                $img = $trainer['gender'] == 'm' ? 'https://randomuser.me/api/portraits/men/' . $rand . '.jpg' : 'https://randomuser.me/api/portraits/women/' . $rand . '.jpg';
                $div = "<div class='trainer-item'>
                    <div class='trainer-image'>
                    <img class=\"round\" src=$img alt=\"user\" />   
                    </div>
                    <div class='trainer-details'>
                    <h2>" . $trainer['name'] . " ( Trainer )</h2>
                    <p> Phone No: " . $trainer['phNo'] . "</p> <p>Email: " . $trainer['email'] . "</p>
                    <p>Center: " . $trainer['center'] . "</p>
                    </div>
                    </div>";
                return $div;
            }
            // get center details from center table
            // print_r($center_details);
            $img = $center_details['image'];
            echo "<div class='photo-card'>
            <div class='photo-background'
                style='background:url(\"$img\")'>
            </div>
                <div class='photo-details'>
                    <h1>{$center_details["location"]}</h1>
                    <p style='color:#a3a3a3'>This is your currently alloted center. To re-allocate center contact the gym authorities.</p>
                    <div class='photo-meta'>
                        <ul >
                        <li style='list-style:none;color:#a3a3a3'><div class='equipment'>
                            <h4>Email</h4>
                            <ul>
                                <li>{$center_details['email']}</li>
                            </ul>
                        </div></li>
                        <li style='list-style:none;'>
                        <div class='resolution'>
                            <h4>Phone</h4>
                            <ul>
                                <li style='list-style:none;color:#a3a3a3'>{$center_details['phone']}</li>
                            </ul>
                        </div></li>
                        </ul>
                    </div>
                </div>
            </div>";

            if ($tid != NULL) {
                echo '<div class="trainer-wrapper trainer-list">';
                $sql = "SELECT * from Trainer where id = $tid";
                $result = query_table($sql);
                $trainer = mysqli_fetch_assoc($result);

                $div = generateTrainerDetails(
                    array(
                        "name" => $trainer['name'],
                        "center" => $center_details['location'],
                        "phNo" => $trainer['phone'],
                        "gender" => $trainer['gender'],
                        "email" => $trainer['email']
                    )
                );
                echo $div;
                echo '</div>';
                echo "<br>";
                // create a button to reset trainer
                echo "<form action='reset_trainer.php' method='post' class='reset_trainer'>
                <input type='submit' value='Reset Trainer' class='btn btn-primary'>
                </form>";

            }

            ?>
        </div>
    </div>
    <?php
    //check if tid is null
    if ($tid == null) {

        $trainers = get_all_trainer_details_from_center($cid);

        // generate a form to choose trainers, each trainer name in a radio button
        echo "<form action='handle_trainer_submit.php' method='post' class='trainer-form'>
        <h2>Choose a trainer</h2>
        <div class='trainer-container'>";
        foreach ($trainers as $trainer) {
            echo "<input type='radio' id='{$trainer['id']}' name='trainer' value='{$trainer['id']}' />";
            echo "<label for='{$trainer['id']}'>";
            echo '<div class="trainer-wrapper trainer-list">';
            echo generateTrainerDetails(
                array(
                    "name" => $trainer['name'],
                    "center" => $center_details['location'],
                    "phNo" => $trainer['phone'],
                    "gender" => $trainer['gender'],
                    "email" => $trainer['email']
                )
            );
            echo "</div>";
            echo "</label>";
        }
        echo "</div>
        <div class='trainer-form-footer'>
        <input type='submit' value='Allocate Trainer'>
        <input type='reset' value='Clear'>
        </div>
        </form>";

    }
    ?>


</body>

</html>