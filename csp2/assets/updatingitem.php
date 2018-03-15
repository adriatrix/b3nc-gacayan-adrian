<?php

$item_id = $_POST['name_id'];
header("location: ../item.php?id=$item_id");

session_start();
$_SESSION['feedback_msg'] = "Updated item details successfully";

require '../connect.php';

//
// $target_dir = "img/items/";
// $target_file = $target_dir . basename($_FILES['image']['name']);
// $target = "assets/img/items/";

// var_dump($item_id);
//
$name = $_POST['name'];
// $image = $target .''. ($_FILES['image']['name']);

$price = $_POST['price'];
$description = $_POST['description'];
$stock = $_POST['stock'];
// var_dump($stock);
// var_dump($price);
$release_date = $_POST['release_date'];


// $image = $_POST['image'];

$rarity = $_POST['rarity'];
$series = $_POST['series'];
$brand = $_POST['brand'];
$sub_brand = $_POST['sub-brand'];

// if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)) {
//   echo "file is uploaded";
// } else {
//   echo "error has occured";
// }

// echo $name . '<br>' .  $price . '<br>' .  $description . '<br>' .  $rarity . '<br>' .  $release_date;
// echo $series . '<br>' .  $brand . '<br>' .  $sub_brand . '<br>' .  $stock;

$sql = "UPDATE items SET name = '$name', price = '$price', description = '$description', stock = '$stock', release_date = '$release_date' WHERE (id = '$item_id')";

// var_dump($sql);
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


mysqli_close($conn);
