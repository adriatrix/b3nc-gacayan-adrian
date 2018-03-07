<?php

session_start();

session_destroy();

session_start();
$_SESSION['feedback_msg'] = "Signed out successfully";
header('location: home.php');
