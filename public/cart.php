<?php
session_start();

$action = $_GET['action'];
$id = (int) $_GET['id'];

if($action != 'add' & $action != 'remove' || 'id'=='0'){
    echo "0";
    exit();
}



if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$cart = $_SESSION['cart'];

if($action=='add'){
    if(!isset($cart[$id])){
        $cart[$id] = 1;
    } else {
        $cart[$id]++;
    }
}

if($action=='remove'){
    if(isset($cart[$id])){
        if($cart[$id]==1){
            unset($cart[$id]);
        } else {
            $cart[$id]--;
        }
    }
}

$_SESSION['cart'] = $cart;

header('Location: cart_view.php');
exit();
