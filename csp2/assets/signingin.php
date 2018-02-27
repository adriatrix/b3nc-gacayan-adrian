<?php

session_start();

require '../connect.php';

$userName = $_POST['username'];
$passWord = sha1($_POST['password']);

$sql = "select * from users where username = '$userName'";
$result = mysqli_query($conn, $sql) or die(mysql_error());
$user = mysqli_fetch_assoc($result);

$isLogInSuccessful = false;

if (mysqli_num_rows($result) > 0) {
    if ($userName == $user['username'] && $passWord == $user['password']) {
        // echo 'Login was successful.';
        $isLogInSuccessful = true;
        $_SESSION['current_user'] = $user['username'];
        $_SESSION['role'] = $user['role_id'];
    }
} else {
  echo("user not found");
}


if ($isLogInSuccessful) {
    header('location: ../index.php');
} else {
    header('location: ../signin.php');
}
