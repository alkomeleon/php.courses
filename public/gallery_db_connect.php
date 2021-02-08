<?php

$host = "127.0.0.1";
$login = "root";
$password = "root";
$dbName = "gallery";

$connection = mysqli_connect($host, $login, $password, $dbName);

/* check connection */
if (!$connection) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//$sql = "SELECT * FROM images";
//$res = mysqli_query($connection, $sql);
//echo "<pre>";
//var_dump(mysqli_fetch_all($res, MYSQLI_ASSOC));
//echo "</pre>";