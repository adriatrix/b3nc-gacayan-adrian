<?php

require '../connect.php';

$user_id = $_POST['user_id'];

$sql = "delete from users where id = '$user_id'";

mysqli_query($conn, $sql);

// $file = file_get_contents('users.json');
// $users = json_decode($file, true);
//
// array_splice($users, $user_id, 1);
//
// $jsonFile = fopen('users.json', 'w');
// fwrite($jsonFile, json_encode($users, JSON_PRETTY_PRINT));
// fclose($jsonFile);


header("location: ../settings.php");

mysqli_close($conn);


 ?>
