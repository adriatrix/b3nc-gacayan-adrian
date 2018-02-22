<?php

  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $db_name = 'kraff_beeer';

  $conn = mysqli_connect($hostname, $username, $password, $db_name);

  //test if connect is successful
  // if($conn)
  //   echo'Database connection was successful';
  // else
  //   die('Connect failed: '.mysqli_error($conn));


  if (!$conn)
    die('Connection failed: ' .mysqli_error($conn));
