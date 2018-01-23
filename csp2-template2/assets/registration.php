<?php

$userName = $_POST['username'];
$passWord = $_POST['password'];
$email = $_POST['email'];

// echo $userName . ' ' . $passWord . ' ' . $email;

$file = file_get_contents('users.json');
$users = json_decode($file, true);

$newUser = array('username' => $userName, 'password' => $passWord, 'email' => $email, 'role' => 'user');

array_push($users, $newUser);

$jsonFile = fopen('users.json', 'w');
fwrite($jsonFile, json_encode($users, JSON_PRETTY_PRINT));
fclose($jsonFile);

header('location: ../login.php');
