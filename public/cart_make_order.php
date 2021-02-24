<?php
include "db.php";
session_start();


$sql = "INSERT INTO `gallery`.`order` (`user_id`, `address`) VALUES ('" . $_SESSION['user_id']. "', 'address');";
$res = mysqli_query(getConnection(), $sql);
$order_id = mysqli_insert_id(getConnection());


foreach ($_SESSION['cart'] as $id => $count){
    $sql = "SELECT * FROM images WHERE id=$id";
    $res = mysqli_query(getConnection(), $sql);
    $cartItem = mysqli_fetch_assoc($res);
    $sql = "INSERT INTO `gallery`.`order_info` (`order_id`, `prod_id`, `count`, `price`) VALUES ($order_id, $id, $count," . $cartItem['price'] . ")";
    $res = mysqli_query(getConnection(), $sql);
}

$_SESSION['cart'] = [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <style>
        body {
            background-color: #c9c9c9;
            padding: 30px;
            margin: 20px;
        }
        a {
            text-decoration: none;
        }
        h1 {
            color: grey;
            font-family: Arial;
        }
        .pict {
            border: grey 3px solid;
            transition: all 0.2s;
            margin-top: 20px;
            margin-right: 20px;
            width: <?=$img["width"];?>px;
            height: <?=$img["height"];?>px;
        }
        .description {
            margin-top: 20px;
            color: grey;
            font-family: Arial;
            font-weight: bold;
            text-align: left;
        }
        .button {
            font-family: Arial;
            text-transform: uppercase;
            background-color: gray;
            color: white;
            font-weight: bold;
            border-radius: 5%;
            width: 150px;
            transition: all 0.2s;
            border: none;
            padding: 6px;
            text-align: center;
        }
        .button:hover {
            background-color: lightcoral;
        }

    </style>
</head>
<body>
    <a class="button" href="catalog.php">back</a>
    <?php include "menu.html"?>

    <div>Ваш заказ успешно оформлен</div>

</body>
</html>