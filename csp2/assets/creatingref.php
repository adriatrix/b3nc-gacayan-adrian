<?php

// require '../connect.php';

$reference_num_length = 8;

$reference_num_found = false;

$possible_chars = "23456789BCDFGHJKMNPQRSTVWXYZ";

while (!$reference_num_found) {
  $reference_num = "";
  $i = 0;
  while ($i < $reference_num_length) {
      $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);
      $reference_num .= $char;
      $i++;
  }

  $sql = "SELECT reference_num FROM orders WHERE reference_num='".$reference_num."'";
  $result = mysqli_query($conn, $sql) or die(mysql_error().' '.$sql);
  if (mysqli_num_rows($result)==0) {
      $reference_num_found = true;
  }

}

$_SESSION['order_id'] = $reference_num;

// echo 'Our unique reference number is: '.$reference_num;
