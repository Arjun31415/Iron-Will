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

            <div class="photo-card">
                <div class="photo-background"></div>
                <div class="photo-details">
                    <h1>Center</h1>
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