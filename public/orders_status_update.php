<?php
include "db.php";
session_start();
$order_id = (int) $_GET['order_id'];
$state = (int) $_GET['state'];

$sql = "UPDATE `gallery`.`order` SET `state` = '" . $state . "'WHERE (`id` = " . $order_id . ")";
$res = mysqli_query(getConnection(), $sql);

header('Location: orders.php');
exit();