<?php
session_start();

$id = (int) $_GET['id'];

if($id == 0){
    echo 0;
    exit();
}

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
    echo 1;
    exit();
}

$cart = $_SESSION['cart'];


if(isset($cart[$id])){
    if($cart[$id]==1){
        unset($cart[$id]);
    } else {
        $cart[$id]--;
    }
}


$_SESSION['cart'] = $cart;

echo '1';
