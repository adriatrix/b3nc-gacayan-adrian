<?php

  session_start();

  header('location: ../order_confirmation.php');

  require '../connect.php';

  require 'creatingref.php';

  $shipping = $_POST['shipping'];
  $purchase_date = date('Y-m-d H:i:s');
  if (isset($_SESSION['current_user']) ) {
    $user_name = $_SESSION['current_user'];
  }

  $sql = "SELECT * FROM order_status WHERE status = 'Received'";
  $result = mysqli_query($conn, $sql);
  while ($order_status = mysqli_fetch_assoc($result)) {
    extract($order_status);
    $order_status_id = $id;
  }

  $sql = "SELECT * FROM users WHERE username = '".$user_name."'";
  $result = mysqli_query($conn, $sql);
  while ($users = mysqli_fetch_assoc($result)) {
    extract($users);
    $user_id = $id;
  }

  $sql = "INSERT INTO orders (reference_num, ship_method, purchase_date, order_status_id, user_id) VALUES ('".$reference_num."','".$shipping."','".$purchase_date."','".$order_status_id."','".$user_id."')";
  mysqli_query($conn, $sql);

  $totalprice = 0;
  $totalqty = 0;
  $newstock = 0;
  $my_basket = $_SESSION['cart'];

  foreach ($my_basket as $key => $basket) {
    $sql = "SELECT id, price, stock FROM items WHERE id = '".$key."'";
    $result = mysqli_query($conn, $sql);
    $item = mysqli_fetch_assoc($result);
    extract($item);

    if($my_basket[$key] == 0 || is_nan($my_basket[$key])) {
      $my_basket[$key] = 1;
    }

    $sub_total = $my_basket[$key] * intval($price);
    $fsub_total = number_format($sub_total,2);

    $newstock = intval($stock) - $my_basket[$key];
    $totalqty = $totalqty + $my_basket[$key];
    $totalprice = intval($totalprice,10) + intval($sub_total,10);

    $sql = "UPDATE items SET stock = '$newstock'WHERE (id = '$key')";
    var_dump($sql);
    mysqli_query($conn, $sql);

    $sql = "SELECT * FROM orders WHERE reference_num = '".$reference_num."'";
    $result = mysqli_query($conn, $sql);
    while ($orders = mysqli_fetch_assoc($result)) {
      extract($orders);
      $order_id = $id;

      $sql = "INSERT INTO order_details (order_id, quantity, subtotal, item_id) VALUES ('".$order_id."','".$my_basket[$key]."','".$sub_total."','".$key."')";
      mysqli_query($conn, $sql);

    }
    if (isset($_SESSION['cart'])) {
      unset($_SESSION['cart']);
      $_SESSION['basket_count'] = 0;

    }
  }

  mysqli_close($conn);
