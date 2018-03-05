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
  <div class="field">
  <p class="control"><strong>Name:</strong>
  <input class="input" type="text" name="name" value="'.$name.'" required>
  </p>
  </div>
  <div class="field is-horizontal">
  <div class="field-body">
  <div class="field">
  <p class="control"><strong>Price:</strong>
  <input class="input" type="number" step=".01" min="0" name="price" value="'.$price.'" required>
  </p>
  </div>
  <div class="field">
  <p class="control"><strong>Stock:</strong>
  <input class="input" type="number" step="1" min="0" name="stock" value="'.$stock.'" required>
  </p>
  </div>
  </div>
  </div>
  <div class="field">
  <p class="control"><strong>Description:</strong>
  <textarea class="textarea" name="description">'.$description.'</textarea>
  </p>
  </div>
  <div class="field">
  <p class="control"><strong>Release Date:</strong>
  <input class="input" type="date" name="release_date" value="'.$release_date.'" required>
  </p>
  </div>
  ';


  $sql = "SELECT * FROM rarities";
  $result = mysqli_query($conn, $sql);

  echo '
  <div class="field">
  <p class="control"><strong>Rarity:</strong>
  <div class="select">
  <select name="rarity">
  ';

  while ($rarity = mysqli_fetch_assoc($result)) {
    extract($rarity);
    if ($rarity_id == $id) {
      echo '
      <option value ="'.$rarity.'" selected>'.$rarity.'</option>
      ';
    } else {
      echo '
      <option value ="'.$rarity.'">'.$rarity.'</option>
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
  <select name="brand">
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

  </div>
  </div>
  ';

  ?>
