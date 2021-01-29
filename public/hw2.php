<?php
/*1 задание*/
$a = 0;
$b = 5;
if ($a >= 0 && $b >= 0)
   echo $a - $b;
elseif ($a < 0 && $b < 0)
   echo $a * $b;
else
   echo $a + $b;

/*3 задание*/
function summ($a, $b) {
    return $a + $b;
}
function subt($a, $b) {
    return $a - $b;
}
function mult($a, $b) {
    return $a * $b;
}
function div($a, $b) {
    return $a / $b;
}

/*4 задание*/
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case '+':
            return "$arg1 + $arg2";
        case '-':
            return "$arg1 - $arg2";
        case '*':
            return "$arg1 * $arg2";
        case '/':
            return "$arg1 / $arg2";
    }
}
