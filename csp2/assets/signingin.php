<?php

session_start();

require '../connect.php';

$userName = $_POST['username'];
$passWord = sha1($_POST['password']);


$sql = "SELECT u.username, u.password, r.role FROM users u JOIN roles r ON (u.role_id = r.id) WHERE u.username = '$userName'";
// $sql = "select * from users where username = '$userName'";
$result = mysqli_query($conn, $sql) or die(mysql_error());

// var_dump($user);

$isLogInSuccessful = false;

if (mysqli_num_rows($result) > 0) {
  $user = mysqli_fetch_assoc($result);
  // var_dump($user);
  if ($userName == $user['username'] && $passWord == $user['password']) {
      $isLogInSuccessful = true;
      $_SESSION['current_user'] = $user['username'];
      $_SESSION['user_role'] = $user['role'];
      // var_dump ($_SESSION['current_user']);
      // var_dump ($_SESSION['user_role']);
    }
  }


if ($isLogInSuccessful) {
    $_SESSION['feedback_msg'] = "Signed in successfully";
    if (isset($_SESSION['cart'])) {
    header('location: ../basket.php');
    } else {
    header('location: ../catalogue.php');
    }
} else {
    $_SESSION['feedback_msg'] = "Invalid username and/or password";
    header('location: ../signin.php');
}
