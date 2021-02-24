<?php
include "db.php";
session_start();
$sql = "SELECT
	ord.id		as order_id,
    user_id,
    users.name,
    ord.address,
    ord.date,
    ord.state,
    (SELECT sum(inf.count * inf.price) FROM order_info as inf WHERE inf.order_id = ord.id) as order_sum
FROM
	`order` as ord
    inner join users on users.id = ord.user_id";
$res = mysqli_query(getConnection(), $sql);
$order = mysqli_fetch_all($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
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
            text-transform: uppercase;
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
        table {
            font-family: Arial;
            font-weight: bold;
            color: #636363;
            text-align: center;
            border: 1px solid #636363;
            border-collapse: collapse;
        }
        tr {
            height: 120px;
            border: 1px solid #636363;
        }
        td {
            width: 160px;
            border: 1px solid #636363;
        }

    </style>
</head>
<body>
<a class="button" href="catalog.php">back</a>
<?php include "menu.html"?>


<div>
    <table>
        <tr>
            <td>ORDER:</td>
            <td>USER:</td>
            <td>USERNAME:</td>
            <td>PRICE:</td>
            <td>ADDRESS:</td>
            <td>DATE:</td>
            <td>ORDER STATE:</td>
            <td>ACTION:</td>
        </tr>
        <?php foreach ($order as $item): ?>
        <tr>
            <td><?=$item["order_id"];?></td>
            <td><?=$item["user_id"];?></td>
            <td><?=$item["name"];?></td>
            <td><?=$item["order_sum"];?> $</td>
            <td><?=$item["address"];?></td>
            <td><?=$item["date"];?></td>
            <td><?=$item["state"];?></td>
            <td><a class="button" href="orders_status_update.php?state=1&order_id=<?=$item["order_id"];?>">Send Order</a><br><br>
                <a class="button" href="orders_status_update.php?state=2&order_id=<?=$item["order_id"];?>">Delivered</a><br><br>
                <a class="button" href="orders_status_update.php?state=3&order_id=<?=$item["order_id"];?>">Cancel Order</a></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>

</body>
</html>

