<?php
session_start();
?>
<?php

// check if session exists
if ($_SESSION['email']) {
  // if exists (user is already logged in)
  // redirect to profile.php
  header('Location: profile.php');
  die();
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="./login.css" />
  <link rel="stylesheet" href="./styles.css" />

  <title>Fitness</title>
</head>

<body>
  <div class="login1">
    <?php
    $succ = $_GET['success'];
    echo "<p id=success >$succ</p>";
    ?>
    <form class="form" action="./handleLogin.php" method="POST">
      <h2 style="color: white; text-align: center; margin-bottom: 1rem;">
        Login
      </h2>
      <div class="insidelogin">
        <input type="text" name="email" id="email" required placeholder="Email" />
      </div>
      <div class="insidelogin">
        <input type="password" name="password" id="password" placeholder="Password" required />
      </div>
      <input type="submit" value="Login" class="submit-btn" />
      <?php
      $err = $_GET['error'];
      echo "<p id=error >$err</p>";
      ?>
      <div class="already_login">
        <p>Don't have an account? <a href="Register.php">Sign up !</a> </p>
      </div>
    </form>
  </div>
</body>

</html>