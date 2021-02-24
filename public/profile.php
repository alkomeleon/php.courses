<?php

session_start();
//if(isset($_SESSION['user_id'])){
//    echo 'Hello, ' . ($_SESSION['user_id']);
//} else {
//    header("Location: login.php");
//    exit();
//}

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include "db.php";

function getUserById(int $id) {
    return queryOne(
        "SELECT * FROM users WHERE id = {$id}"
    );
}

$user = getUserById($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
<div>
    <h1>Profile</h1>
    <?php include "menu.html"?>
</div>
<div>
Hello <?=$user["name"];?>! <br>
Your login: <?=$user["login"];?>
</div>
</body>
</html>