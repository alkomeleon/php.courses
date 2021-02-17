<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='GET'){
    $errorType = (int) $_GET["error_type"];
    if(isset($_SESSION['user_id'])){
        header("Location: profile.php");
        exit();
    }

} elseif ($_SERVER['REQUEST_METHOD']=='POST'){
    $login = $_POST['login'];
    $password = $_POST['password'];
    if(strlen($login) == 0 || strlen($password) == 0){
        header("Location: login.php?error_type=2");
        exit();
    }


    include_once "db.php";

    $user = getUserByLoginPassword($login, $password);
    if(is_null($user)){
        header("Location: login.php?error_type=1");
        exit();
    }
        //  setcookie('user_id', $user['id']);
        $_SESSION['user_id'] = $user['id'];
        header("Location: profile.php");
        exit();
}







function getUserByLoginPassword(string $login, string $password) {
    $sql = "SELECT * FROM users
                WHERE login = '{$login}'
                AND password = '{$password}'";
    return queryOne($sql);
}
?>

<!DOCTYPE HTML>
<html lang="en">
<style>
    body {
        background-color: #c9c9c9;
    }
</style>
<head>
  <meta charset="UTF-8">
  <title>Enter Page</title>
 </head>
<body>
<?php include "menu.html"?>
    <h1>Log in</h1>
<?php if ($errorType == 1):?>
    <div class="error">Incorrect login or password</div>
<?php endif;?>
<?php if ($errorType == 2):?>
    <div class="error">Please, enter login and password</div>

<?php endif;?>

    <form method="post">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="ENTER">
    </form>
</body>
</html>