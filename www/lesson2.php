<?php
//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.

//$n = 100;
//$i = 0;
//while ($i <= $n) {
//    if ($i % 3 === 0 ) {
//        echo $i . "<br/>";
//    }
//
//    $i++;
//}

//2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
//0 – это ноль.
//1 – нечётное число.
//2 – чётное число.
//3 – нечётное число.

//$n = 10;
//$i = 0;
//
//do{
//
//if ($i === 0) {
//    echo 'ноль <br/>';
//}elseif ($i % 2 === 0){
//    echo $i . ' - четное число <br/>';
//}else {
//    echo $i . ' - не четное число <br/>';
//}
//$i++;
//
//} while ($i <= $n);

//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с
//названиями городов из соответствующей области.
//Вывести в цикле значения массива, чтобы результат был таким:
//Московская область:
//Москва, Зеленоград, Клин.
//Ленинградская область:
//Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
//Рязанская область…(названия городов можно найти на maps.yandex.ru)

//$regions = [
//    'Московская область' => [
//         0 => 'Москва',
//         'Зеленоград',
//         'Клин'
//    ],
//    'Ленинградская область' => [
//        'Питер',
//        'павловск'
//    ],
//    'Пязанская область' => [
//        'Ростов'
//    ]
//];
//
//foreach ($regions as $obl => $cities) {
//    echo $obl . ': </br>';
//    foreach ($cities as $key => $city) {
//        echo $city . '</br>';
//    }
//}

//4. Объявить массив, индексами которого являются буквы русского языка,
//а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.


function getWordAsArray($word) {
    $len = mb_strlen($word, 'UTF-8');
    $result = [];
    for ($i = 0; $i < $len; $i++) {
        $result[] = mb_substr($word, $i, 1, 'UTF-8');
    }
    return $result;
}


$alfavit = [
    'р' => 'r',
    'о' => 'o',
    'с' => 's',
    'т' => 't',
    'в' => 'v',
];


function translit($word, $alfavitDictionary) {
$hui = '';
$slovo = getWordAsArray($word);
foreach ($slovo as $key => $letter) {
    foreach ($alfavitDictionary as $k => $AlfavitLatter) {
        if ($letter === $k) {
            $hui.= $AlfavitLatter;
        }
    }
}
return $hui;
}

function translit2($word, $alfavitDictionary) {
    $hui = '';
    $slovo = getWordAsArray($word);
    foreach ($slovo as $key => $letter) {
        $hui.= $alfavitDictionary[$letter];
    }
    return $hui;
}

$variant1 = translit('рост', $alfavit);
$variant2 = translit2('рост', $alfavit);

echo $variant1;
echo '<br>';
echo $variant2;


