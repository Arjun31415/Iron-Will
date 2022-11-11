<?php
session_start();
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
    #describe table user
    // $sql = "DESCRIBE User";
    // describe_table($sql);
    
    # modify gender as m where email is x
    // $sql = "UPDATE User set gender = 'm' where email like 'manastiwari12121@gmail.com'";
    // $sql = "Select * from User";
    // query_table($sql);
    
    # show tables in databse
    // $sql = "SHOW TABLES";
    // show_tables($sql);
    ?>
    <nav>
        <ul class="nav__link">
            <li class="nav__item"><a href="./index.html">Home</a></li>
            <li class="nav__item"><a href="profile.php" class="active">Profile</a></li>
            <li class="nav__item"><a href="trainers.php">Trainers</a></li>
            <li class="nav__item"><a href="centers.php">Centers</a></li>
            <li class="nav__item"><a href="exercises.php">Exercises</a></li>
            <li class="nav__item right-end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="master_container">
        <div class="card-container">
            <img class="round" src="https://randomuser.me/api/portraits/men/13.jpg" alt="user" />
            <h3>Ricky Park</h3>
            <h6>Trainee</h6>
            <p>Email : manastiwari11222@gmail.com <br>Phone : 8576957171</p>

            <?php
            function generateTrainerDetails($trainer)
            {
                $img = $trainer['gender'] == 'M' ? 'https://randomuser.me/api/portraits/men/13.jpg' : 'https://randomuser.me/api/portraits/women/5.jpg';
                $div = "<div class='trainer-item'>
                    <div class='trainer-image'>
                    <img class=\"round\" src=$img alt=\"user\" />   
                    </div>
                    <div class='trainer-details'>
                    <h2>" . $trainer['name'] . "</h2>
                    <p> Phone No: " . $trainer['phNo'] . "</p> <p>Email: " . $trainer['email'] . "</p>
                    <p>Center: " . $trainer['center'] . "</p>
                    </div>
                    </div>";
                return $div;
            }
            echo '<div class="trainer-wrapper trainer-list">';

            $div = generateTrainerDetails(array("name" => "Trainer 1", "center" => "Center 1", "phNo" => 123456789, "gender" => 'M', "email" => "isuck@example.com"));
            echo $div;
            echo '</div>';
            ?>

            <br>

            <div class="photo-card">
                <div class="photo-background"></div>
                <div class="photo-details">
                    <h1>Trainer</h1>
                    <p>I'm pretty new to photography, but was able to land this shot earlier today. I think it looks
                        quite nice!</p>
                    <div class="photo-meta">
                        <div class="equipment">
                            <h4>Camera</h4>
                            <ul>
                                <li>Canon EOS 700D</li>
                            </ul>
                        </div>
                        <div class="resolution">
                            <h4>Resolution</h4>
                            <ul>
                                <li>5184x2268 pixels</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>