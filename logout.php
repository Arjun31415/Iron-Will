<?php
// destroy session
session_start();
session_destroy();
// redirect to home page
header("Location: index.html");
?>