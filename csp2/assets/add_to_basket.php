<?php

  session_start();

  $id = $_POST['item_id'];
  $quantity = $_POST['item_quantity'];

  $_SESSION['cart'][$id] = $quantity;
  $_SESSION['basket_count'] = array_sum($_SESSION['cart']);

  // echo "". $_SESSION['basket_count']."";

  echo '
  <span class="my-badge">'.$_SESSION['basket_count'].'</span>
  ';
