<?php

  $hostname = 'localhost';
  $username = 'id5035417_admin';
  $password = 'password1';
  $db_name = 'id5035417_popstopshop';

  $conn = mysqli_connect($hostname, $username, $password, $db_name);

  if (!$conn)
    die('Connection failed: ' .mysqli_error($conn));
