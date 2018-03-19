<?php

$order_id = $_POST['order_id'];
header("location: ../order_details.php?id=$order_id");

session_start();
$_SESSION['feedback_msg'] = "Updated order status successfully";

require '../connect.php';

$o_status = $_POST['order-status'];

$sql = "UPDATE orders o JOIN order_status os SET o.order_status_id = os.id WHERE (o.id = '$order_id' AND os.status = '$o_status')";
// var_dump($sql);
mysqli_query($conn, $sql);

mysqli_close($conn);
