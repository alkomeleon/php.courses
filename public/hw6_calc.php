<?php
include "hw6_calc_func.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>calculator</title>
    <style>
        body {
            background-color: grey;
        }
    </style>
</head>
<body>
<form enctype="multipart/form-data" action="hw6_calc.php" method="POST">
    <input name="op1" type="number" placeholder="enter the number">
    <select name="operation">
        <option value="+">summ</option>
        <option value="-">diff</option>
        <option value="*">mult</option>
        <option value="/">div</option>
    </select>
    <input name="op2" type="number" formmethod="post" placeholder="enter the number">
    <input type="submit" value="get result">
</form>
<?php if(!is_null($result)):?>
<div>Result: <?=$result;?></div>
<?php endif; ?>
</body>
</html>