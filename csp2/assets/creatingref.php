<?php

require '../connect.php';

$unique_ref_length = 8;

$unique_ref_found = false;

$possible_chars = "23456789BCDFGHJKMNPQRSTVWXYZ";

while (!$unique_ref_found) {
  $unique_ref = "";
  $i = 0;
  while ($i < $unique_ref_length) {
      $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);
      $unique_ref .= $char;
      $i++;
  }

  $sql = "SELECT reference_num FROM orders WHERE reference_num='".$unique_ref."'";
  $result = mysqli_query($conn, $sql) or die(mysql_error().' '.$sql);
  if (mysqli_num_rows($result)==0) {
      $unique_ref_found = true;
  }

}

echo 'Our unique reference number is: '.$unique_ref;

 ?>
