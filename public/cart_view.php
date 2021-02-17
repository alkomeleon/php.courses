<?php
include "db.php";
include "make_gallery.php";

session_start();
$cart = [];

foreach ($_SESSION['cart'] as $id => $count){
    $sql = "SELECT * FROM images WHERE id=$id";
    $res = mysqli_query(getConnection(), $sql);
    $cartItem = mysqli_fetch_assoc($res);
    $cartItem["count"] = $count;
    $cart[] = $cartItem;
}


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

    <?php foreach ($cart as $item): ?>
    <div style="display: flex; flex-direction: row">
        <img class="pict" width="150px" height="150px" src="<?=$item["path"] . "\\" . $item["name"] . "." . $item["ext"];?>"/>
        <div class="description">
            NAME: <?=$item["name"];?>.<?=$item["ext"];?><br>
            DETAILED DESCRIPTION: <?=$item["desc"];?><br>
            SIZE: <?=$item["width"];?> x <?=$item["width"];?><br>
            PRICE: <?=$item["price"]*$item["count"];?> $<br>
            COUNT: <?=$item["count"];?><br><br>
            <a href="cart.php?action=add&id=<?=$item["id"];?>" class="button">add</a>
            <a href="cart.php?action=remove&id=<?=$item["id"];?>" class="button">remove</a>
        </div>
    </div>
    <?php endforeach;?>


</body>
</html>