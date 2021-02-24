<?php
include "db.php";
include "make_gallery.php";

$gallery = makeGallery(getConnection());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Images</title>
    <script src="fetch.js"></script>
    <style>
        body {
            background-color: #c9c9c9;
            padding: 30px;
            display: flex;
            flex-direction: column;
        }
        a {
            text-decoration: none;
        }
        h1 {
            color: grey;
            font-family: Arial;
            text-transform: uppercase;
        }
        .menu {
            display: flex;
            align-content: flex-end;
            align-items: center;
        }
        .pict {
            margin: 5px;
            border: grey 3px solid;
            border-radius: 50%;
            transition: all 0.2s;
        }
        .pict:hover {
            -webkit-box-shadow: 0px 0px 34px 15px rgba(255,255,255,1);
            -moz-box-shadow: 0px 0px 34px 15px rgba(255,255,255,1);
            box-shadow: 0px 0px 34px 15px rgba(255,255,255,1);
        }
        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-wrap: wrap;
        }
        .products {
            display: flex;
            flex-direction: row;
            align-items: center;
            flex-wrap: wrap;
        }
        .button {
            font-family: Arial;
            text-transform: uppercase;
            background-color: gray;
            color: white;
            font-weight: bold;
            border-radius: 5%;
            width: 120px;
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
<div class="menu">
    <h1>Products</h1>
    <?php include "menu.html"?>
</div>
    <div class="products">
    <?php foreach ($gallery as $image): ?>
        <div class="product">
            <a href="view_image.php?id=<?=$image["id"];?>">
                <img class="pict" width="150" src="<?=$image["path"] . "\\" . $image["name"] . "." . $image["ext"];?>"/>
            </a>
            <a href="view_image.php?id=<?=$image["id"];?>"></a>
            <a class="button" onclick="post('cart_add.php?id=<?=$image["id"];?>')">add to cart</a>
        </div>
    <?php endforeach;?>
    </div>
</body>
</html>