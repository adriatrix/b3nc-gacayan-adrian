<?php

header("location: ../profile.php");

session_start();
$_SESSION['feedback_msg'] = "Updated user details successfully";
require '../connect.php';

$user_id = $_POST['name_id'];
$password = sha1($_POST['password']);

var_dump($password);

$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact_num = $_POST['contact_num'];

$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];


$sql = "UPDATE users SET email = '$email', firstname = '$firstname', lastname = '$lastname', address1 = '$address1', address2 = '$address2', city = '$city', contact_num = '$contact_num', zipcode = '$zipcode' WHERE (id = '$user_id')";

mysqli_query($conn, $sql);


if ($password != '6df9ba338b43e718b5b8f880607f402081c3a172') {
  $sql = "UPDATE users SET password = '$password' WHERE (id = '$user_id')";
  mysqli_query($conn, $sql);
}


mysqli_close($conn);
