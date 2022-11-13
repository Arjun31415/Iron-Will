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

  <title>Fitness</title>
</head>

<body>

  <div class="login1">
    <form class="form" method="POST" name="registerForm" action="./handleRegister.php">
      <h2 style="color: white; text-align: center; margin-bottom: 1rem">
        Register
      </h2>
      <div class="insidelogin">
        <input type="text" name="fullName" id="fullName" placeholder="Full Name" required />
      </div>
      <div class="insidelogin">
        <input type="text" placeholder="Email" name="email" id="email" required />
      </div>
      <div class="insidelogin">
        <input type="text" name="phoneNo" id="phoneNo" placeholder="Phone Number" required />
      </div>
      <div class="insidelogin">
        <input type="text" name="gender" id="gender" placeholder="Gender" required />
      </div>
      <div class="insidelogin">
        <input type="password" name="password" id="loginPassword" placeholder="Password" required />
      </div>
      <div class="insidelogin">
        <input type="password" name="repeatPassword" id="repeatPassword" placeholder="Repeat Password" required />
      </div>
      <input type="submit" value="Sign Up" class="submit-btn" />
      <?php
      $err = $_GET['error'];
      echo "<p id=error >$err</p>";
      ?>
      <div class="login2">
        <p class="already_login">Already have an account? <a class="redirect" href="Login.php">Login</a> </p>
      </div>
    </form>
    <!-- if already registered go to login page -->

  </div>


  <link rel="stylesheet" href="./styles.css" />

</body>

</html>