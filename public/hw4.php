<?php
include "gallery_db_connect.php";
include "make_gallery.php";
$gallery = makeGallery($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Images</title>
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
            /*width: 160px;*/
            /*height: 200px;*/
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
<h1>Products</h1>
<div class="products">
<?php foreach ($gallery as $image): ?>
    <div class="product">
        <a href="<?="view_image.php?id=" . $image["id"];?>">
            <img class="pict" width="150" src="<?=$image["path"] . "\\" . $image["name"] . "." . $image["ext"];?>"/>
        </a>
        <a class="button" href="<?="view_image.php?id=" . $image["id"];?>">Check</a>
    </div>
<?php endforeach;?>
</div>
</body>
</html>