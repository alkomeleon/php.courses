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
            text-align: center;
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
            margin: auto;
            width: <?=$img["width"];?>px;
            height: <?=$img["height"];?>px;
        }

    </style>
</head>
<body>
<h1>
    <?=$img["name"];?>.<?=$img["ext"];?>
</h1>
    <img class="pict" width="<?=$img["width"];?>" height="<?=$img["height"];?>" src="<?=$img["path"] . "\\" . $img["name"] . "." . $img["ext"];?>"/>
</body>
</html>