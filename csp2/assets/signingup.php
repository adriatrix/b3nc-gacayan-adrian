<?php

require '../connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$role_id = 3;
// $first_name = 'Juan';
// $last_name = 'Dela Cruz';
// $address = 'Mandaluyong City';
// $contact = '09997785468';

$sql = "insert into users (username, email, password, role_id) values ('$username','$email','$password','$role_id')";

$result = mysqli_query($conn, $sql);

//check if current new user was successful
if ($result)
  header('location: ../signin.php');
else
  die('Error: ' .$sql. '<br>' . mysqli_error($conn));


mysqli_close($conn);
