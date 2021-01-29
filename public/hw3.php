<meta charset="UTF-8">
<?php
/*ex1*/
$i = 0;
while ($i <= 100) {
    if($i % 3 == 0) {
        echo "$i<br/>";
    }
    $i++;
}

/*ex2*/
$a = 0;
do{
    if ($a == 0) {
        echo "$a - ноль.<br/>";
    } elseif ($a % 2 == 0) {
        echo "$a - четное число.<br/>";
    } else {
        echo "$a - нечетное число.<br/>";
    }
    $a++;
}
while($a <= 10);

/*ex3*/
$arrCity = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Рязань", "Касимов", "Сасово"],
];
foreach ($arrCity as $obl => $cities) {
    echo "$obl:<br/>";
    foreach ($cities as $i => $city) {
        echo $city;
        if($i < count($cities)-1) {
            echo ", ";
        }
    };
//    echo (join(", ", $cities));
    echo "<br/>";
}

/*ex4*/
function translit($text) {
    $arrLet = [
        "a" => "а",
        "б" => "b",
        "в" => "v",
        "г" => "g",
        "д" => "d",
        "е" => "e",
        "ё" => "yo",
        "ж" => "g",
        "з" => "z",
        "и" => "i",
        "к" => "k",
        "л" => "l",
        "м" => "m",
        "н" => "n",
        "о" => "o",
        "п" => "p",
        "р" => "r",
        "с" => "s",
        "т" => "t",
        "у" => "u",
        "ф" => "f",
        "х" => "h",
        "ц" => "c",
        "ч" => "ch",
        "ш" => "sh",
        "щ" => "sh'",
        "ъ" => "'",
        "ы" => "y",
        "ь" => "'",
        "э" => "e",
        "ю" => "yu",
        "я" => "ya",
        " " => " "
    ];
    $newText = "";
    foreach (mb_str_split($text) as $letter){
        $newText .= $arrLet[$letter];
    };
    return $newText;
}
echo translit("курлык");


/*ex5*/
function text($text) {
    $newText = "";
    foreach (mb_str_split($text) as $letter){
        if ($letter == " ") {
            $letter = "_";
        }
        $newText .= $letter;
    };
    return $newText;
}
echo text("п д п д п п п");