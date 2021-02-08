<?php
//function makeGallery ($imgDir) {
//    $dir = @opendir($imgDir) or die("There is an error with your image directory!");
//    $arrImg = [];
//    while ($file = readdir($dir)) //поиск по файлам
//    {
//        if (!is_dir($file)){
//            $arrImg[] = $imgDir . '/' . $file;
//        }
//    }
//    closedir($dir); //закрыть папку
//
//
//
//
//    return $arrImg;
//}
//$imgDir = "img";
//$gallery = makeGallery($imgDir);



function makeGallery ($connection) {
    $sql = "SELECT * FROM images";
    $res = mysqli_query($connection, $sql);
    $arrImg = mysqli_fetch_all($res, MYSQLI_ASSOC);

    return $arrImg;
}

