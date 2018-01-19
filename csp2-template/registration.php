<?php

$userName = htmlspecialchars($_POST['username']);
$passWord = htmlspecialchars($_POST['password']);
// $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
// echo $userName . " " . $confirmPassword . " " . $confirmPassword;

// require 'assets/users.php';
//
//
// array_push($users, ["username" => $userName, "password" => $passWord]);
//
// var_dump($users);

  //import json file
  $file = file_get_contents('assets/users.json');

  //convert to associative array for php access
  $users = json_decode($file, true);

  //add item to array
  array_push($users, array("username" => $userName, "password" => $passWord));


  //open the file to be updated
  //w-writable
  $file = fopen('assets/users.json', 'w');

  //update the users.json file
  //json encode from php to json
  fwrite ($file, json_encode($users, JSON_PRETTY_PRINT));

  // var_export($users);
  //close the file
  fclose($file);

  header('location: login.php');

 ?>
