<?php

$a = 5;
$b = '05';
var_dump($a == $b);         // Почему true? т.к. сравнение не строгое, строка '05' приводится к числовому типу, получается 5, а 5 = 5
var_dump((int)'012345');     // Почему 12345? int преобразует строку в число и отбрасывает лишний 0
var_dump((float)123.0 === (int)123.0); // Почему false? т.к сравнение строгое, а у переменных разные типы
var_dump((int)0 === (int)'hello, world'); // Почему true? т.к в строке 'hello, world' нет цифры, она преобразуется в 0

