<?php
include "gallery_db_connect.php";
$id = (int) $_GET['id'];
$sql = "SELECT * FROM images WHERE id=$id";
$res = mysqli_query($connection, $sql);
$img = mysqli_fetch_assoc($res);
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
<a class="button" href="hw4.php">back</a>
<h1>
    <?=$img["name"];?>.<?=$img["ext"];?>
</h1>
<div style="display: flex; flex-direction: row">
    <img class="pict" width="<?=$img["width"];?>" height="<?=$img["width"];?>" src="<?=$img["path"] . "\\" . $img["name"] . "." . $img["ext"];?>"/>
    <div class="description">
        DETAILED DESCRIPTION: <?=$img["desc"];?> <br>
        SIZE: <?=$img["width"];?> x <?=$img["width"];?><br>
        PRICE: <?=$img["price"];?> $
    </div>
</div>

</body>
</html>