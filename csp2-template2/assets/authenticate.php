<?php

session_start();

require '../connect.php';

$userName = $_POST['username'];
$passWord = sha1($_POST['password']);

// echo $userName . ' ' . $passWord;

// $file = file_get_contents('users.json');
// $users = json_decode($file, true);

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// var_dump($users);

$isLogInSuccessful = false;

// foreach ($users as $user) {
if (mysql_num_rows($user) > 0) {
  // while ($user = mysqli_fetch_assoc($users)) {
    // echo $user['username'] . ' ' . $user['password'];
    // extract($user);

    if ($userName == $user['username'] && $passWord == $user['password']) {
        // echo 'Login was successful.';
        $isLogInSuccessful = true;
        $_SESSION['current_user'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        // break;
    }
} else {
  alert("user not found");
}

if ($isLogInSuccessful) {
    // if successful login
    header('location: ../home.php');
} else {
    // if failed login
    header('location: ../login.php');
}
