<?php

session_start();

$id = $_POST['item_id'];

unset($_SESSION['cart'][$id]);


$_SESSION['basket_count'] = array_sum($_SESSION['cart']);


if (empty($_SESSION['cart'])) {
  unset($_SESSION['cart']);
  $_SESSION['basket_count'] = 0;
}

echo ''.$_SESSION['basket_count'].'';


$_SESSION['feedback_msg'] = "Deleted item successfully";
header("location: ../basket.php");
