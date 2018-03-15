<?php

header('location: ../signin.php');

session_start();
$_SESSION['feedback_msg'] = "Created a new account successfully";

require '../connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = sha1($_POST['confirmPassword']);
$role_id = 3;

$sql = "INSERT INTO users (username, email, password, role_id) VALUES ('$username','$email','$password','$role_id')";

mysqli_query($conn, $sql);


mysqli_close($conn);
