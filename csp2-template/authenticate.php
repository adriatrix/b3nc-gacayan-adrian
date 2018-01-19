<?php

  session_start();

  // $users = [
  //   ['username' => 'admin', 'password' => 'abc123'],
  //   ['username' => 'billy', 'password' => 'ABC*()'],
  //   ['username' => 'user1', 'password' => 'abc123ABC*()']
  // ];

  // require 'assets/users.php';
  // use json instead of users.php
  $file = file_get_contents('assets/users.json');
  $users = json_decode($file, true);

  $isLoginSuccessful = false;

  $userName = htmlspecialchars($_POST['username']);
  $passWord = htmlspecialchars($_POST['password']);

  // echo $userName;
  // echo $passWord;

  foreach ($users as $user) {
    // var_dump($user);
    // echo $user['username'] . '<br>';
    // echo $user['password'] . '<br>';

    if ($user['username'] == $userName && $user['password'] == $passWord) {
        // echo $userName . 'was found.';
        // echo 'Password is correct.';
        // header('location: home.php');
        $isLoginSuccessful = true;
        $_SESSION['role'] = $user['role']; //get role of current user
        break;
      }
  }

  if ($isLoginSuccessful) {
    //successful login
    $_SESSION['current_user'] = $userName;
    // $_SESSION['message'] = 'Login successful.';
    header('location: home.php');
  } else {
    //failed login
    // $_SESSION['message'] = 'Login unsuccessful.';
    header('location: login.php');
  }

  if (isset($_SESSION['current_user']) && $isLoginSuccessful)
    $_SESSION['message'] = 'Login successful.';
  // else
  //   $_SESSION['message'] = 'Login unsuccessful.';


 ?>
