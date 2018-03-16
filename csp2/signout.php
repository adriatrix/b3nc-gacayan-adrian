<?php

session_start();

// session_destroy();
unset($_SESSION['current_user']);
unset($_SESSION['user_role']);

$_SESSION['feedback_msg'] = "Signed out successfully";
header('location: home.php');
