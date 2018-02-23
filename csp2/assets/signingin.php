<?php

session_start();

require '../connect.php';

$userName = $_POST['username'];
$passWord = sha1($_POST['password']);

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$isLogInSuccessful = false;

if (mysql_num_rows($user) > 0) {
    if ($userName == $user['username'] && $passWord == $user['password']) {
        $isLogInSuccessful = true;
        $_SESSION['current_user'] = $user['username'];
        $_SESSION['role'] = $user['role'];
    }
} else {
  alert("user not found");
}

if ($isLogInSuccessful) {
    header('location: ../index.php');
} else {
    header('location: ../signin.php');
}
