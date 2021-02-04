<?php

function makeGallery ($imgDir) {
    $dir = @opendir($imgDir) or die("There is an error with your image directory!");
    $arrImg = [];
    while ($file = readdir($dir)) //поиск по файлам
    {
        if (!is_dir($file)){
            $arrImg[] = $imgDir . '/' . $file;
        }
    }
    closedir($dir); //закрыть папку
    return $arrImg;
}
$imgDir = "img";
$gallery = makeGallery($imgDir);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Изображения из папки <?=$imgDir?></title>
    <style>
        body {
            background-color: #c9c9c9;
            padding: 30px;
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
    </style>
</head>
<body>
<h1>Картиночки</h1>
<div>
<?php foreach ($gallery as $filePath): ?>
    <a href="<?=$filePath;?>" target="_blank">
        <img class="pict" width="150" src="<?=$filePath;?>"/>
    </a>
<?php endforeach;?>
</div>
</body>
</html>