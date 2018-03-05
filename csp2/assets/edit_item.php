<?php

require '../connect.php';

$item_id = $_GET['id'];

// $sql = "SELECT i.*, b.brand, sb.sub_brand, its.status, sr.series FROM items i JOIN brands b ON (i.brand_id = b.id) JOIN sub_brands sb ON (i.sub_brand_id = sb.id) JOIN item_status its ON (i.item_status_id = its.id) JOIN serials sr ON (i.serial_id = sr.id) WHERE i.id = '$id'";
$sql = "SELECT * FROM items WHERE id = '$item_id'";
$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($result);
extract($item);


echo '
  <div class="columns">
  <div class="column is-12">
  <form class="" action="index.html" method="post">
  <div class="field">
  <p class="control"><strong>Name:</strong>
  <input class="input" type="text" name="name" value="'.$name.'" required>
  </p>
  </div>
  <div class="field">
  <p class="control"><strong>Price:</strong>
  <input class="input" type="number" step="any" name="price" value="'.$price.'" required>
  </p>
  </div>
  <div class="field">
  <p class="control"><strong>Description:</strong>
  <textarea class="textarea" name="description" value="'.$description.'" required></textarea>
  </p>
  </div>
  ';


  $sql = "SELECT * FROM item_status";
  $result = mysqli_query($conn, $sql);

  echo '
  <div class="field">
  <p class="control"><strong>Item Status:</strong>
  <div class="select">
  <select name="item_status">
  ';

  while ($item_status = mysqli_fetch_assoc($result)) {
    extract($item_status);
    if ($item_status_id == $id) {
      echo '
      <option value ="'.$status.'" selected>'.$status.'</option>
      ';
    } else {
      echo '
      <option value ="'.$status.'">'.$status.'</option>
      ';
    }
  }

  echo '
  </select>
  </div>
  </p>
  </div>
  ';

  $sql = "SELECT * FROM serials";
  $result = mysqli_query($conn, $sql);

  echo '
  <div class="field">
  <p class="control"><strong>Series:</strong>
  <div class="select">
  <select name="series">
  ';

  while ($serial = mysqli_fetch_assoc($result)) {
    extract($serial);
    if ($serial_id == $id) {
      echo '
      <option value ="'.$series.'" selected>'.$series.'</option>
      ';
    } else {
      echo '
      <option value ="'.$series.'">'.$series.'</option>
      ';
    }
  }

  echo '
  </select>
  </div>
  </p>
  </div>
  ';

  $sql = "SELECT * FROM brands";
  $result = mysqli_query($conn, $sql);

  echo '
  <div class="field">
  <p class="control"><strong>Brands:</strong>
  <div class="select">
  <select name="brands">
  ';

  while ($brand = mysqli_fetch_assoc($result)) {
    extract($brand);
    if ($brand_id == $id) {
      echo '
      <option value ="'.$brand.'" selected>'.$brand.'</option>
      ';
    } else {
      echo '
      <option value ="'.$brand.'">'.$brand.'</option>
      ';
    }
  }

  echo '
  </select>
  </div>
  </p>
  </div>
  ';

  $sql = "SELECT * FROM sub_brands";
  $result = mysqli_query($conn, $sql);

  echo '
  <div class="field">
  <p class="control"><strong>Sub-brand:</strong>
  <div class="select">
  <select name="sub-brand">
  ';

  while ($sub_brand = mysqli_fetch_assoc($result)) {
    extract($sub_brand);
    if ($sub_brand_id == $id) {
      echo '
      <option value ="'.$sub_brand.'" selected>'.$sub_brand.'</option>
      ';
    } else {
      echo '
      <option value ="'.$sub_brand.'">'.$sub_brand.'</option>
      ';
    }
  }

  echo '
  </select>
  </div>
  </p>
  </div>

  </form>
  </div>
  </div>
  ';

  ?>
