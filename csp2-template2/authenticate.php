<?php

  $userName = $_POST['username'];
  $passWord = $_POST['password'];

  // echo $userName . ' ' . $passWord;

  $file = file_get_contents('assets/users.json');
  $users = json_decode($file, true);

  var_dump($users);

  $isLogInSuccessful = false;

  foreach ($users as $user) {
    // echo $user['username'] . ' ' . $user['password'];
    if($userName == $user['username'] && $passWord == $user['password']) {
        echo 'Login was successful.';
        $isLogInSuccessful = true;
        break;
    }
  }

  if ($isLogInSuccessful) {
    header('location: home.php');
  } else {
    header('location: login.php');
  }

 ?>
