<?php


require '../connect.php';

$item_id = $_POST['name_id'];

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$release_date = $_POST['release_date'];


// $image = $_POST['image'];

$rarity = $_POST['rarity'];
$series = $_POST['series'];
$brand = $_POST['brand'];
$sub_brand = $_POST['sub-brand'];

// echo $name . '<br>' .  $price . '<br>' .  $description . '<br>' .  $rarity . '<br>' .  $release_date;
// echo $series . '<br>' .  $brand . '<br>' .  $sub_brand . '<br>' .  $stock;

$sql = "UPDATE items SET name = '$name', price = '$price', description = '$description', stock = '$stock', release_date = '$release_date' WHERE (i.id = '$item_id')";

mysqli_query($conn, $sql);

// $sql = "SELECT i.*, b.brand, sb.sub_brand, its.status, sr.series FROM items i JOIN brands b ON (i.brand_id = b.id) JOIN sub_brands sb ON (i.sub_brand_id = sb.id) JOIN item_status its ON (i.item_status_id = its.id) JOIN serials sr ON (i.serial_id = sr.id) WHERE i.id = '$id'";


$sql = "UPDATE items i JOIN rarities r SET i.rarity_id = r.id WHERE (i.id = '$item_id' AND r.rarity = '$rarity')";

mysqli_query($conn, $sql);

$sql = "UPDATE items i JOIN serials sr SET i.serial_id = sr.id WHERE (i.id = '$item_id' AND sr.series = '$series')";

mysqli_query($conn, $sql);

$sql = "UPDATE items i JOIN brands b SET i.brand_id = b.id WHERE (i.id = '$item_id' AND b.brand = '$brand')";

mysqli_query($conn, $sql);

$sql = "UPDATE items i JOIN sub_brands sb SET i.sub_brand_id = sb.id WHERE (i.id = '$item_id' AND sb.sub_brand = '$sub_brand')";

mysqli_query($conn, $sql);


header("location: ../item.php?id=$item_id");

mysqli_close($conn);
