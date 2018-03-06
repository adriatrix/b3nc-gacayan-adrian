<?php

require '../connect.php';

$item_id = $_POST['name_id'];

$sql = "DELETE FROM items where id = '$item_id'";

mysqli_query($conn, $sql);

header("location: ../catalogue.php");

mysqli_close($conn);
