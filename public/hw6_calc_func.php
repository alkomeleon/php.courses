<?php
$a = $_POST["op1"];
$b = $_POST["op2"];
$operation = $_POST["operation"];

function calculate($a, $b, $operation){
    if ($operation === "+") {
        return $a + $b;
    } elseif ($operation === "-") {
        return $a - $b;
    } elseif ($operation === "*") {
        return $a * $b;
    } elseif ($operation === "/") {
        if ($b != 0) {
            return $a / $b;
        } else {
            return "no way";
        }
    }
}
$result = (calculate($a, $b, $operation));

