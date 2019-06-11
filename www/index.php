<?php

//Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
//Если $a и $b положительные, вывести их разность.
//Если $а и $b отрицательные, вывести их произведение.
//Если $а и $b разных знаков, вывести их сумму.

$a = -10;
$b = 12;

if ($a > 0 & $b > 0) {
    echo $a - $b;
}

if ($a < 0 & $b < 0) {
    echo  $a * $b;
}

if (($a > 0 & $b < 0) || ($a < 0 & $b > 0)){
    echo $a + $b;
}

//Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора
//switch организовать вывод чисел от $a до 15.

$cnt = 8;
$a = 9;

switch ($a){
    case ($a < $cnt) :
        while ($a <= $cnt){
            echo $a . '<br>';
            $a++;
        }
        break;
    default:
        echo 'kjhg';

}

//Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.


function summ($a, $b) {
    return $a + $b;
}

$djopa = summ(10, 11);
echo  $djopa . '<br>';

function razn($a, $b) {
    return $a - $b;
}

$razn = razn(11, 10);
echo $razn . '<br>' ;

function umn($a, $b) {
    return $a * $b;
}

$umn = umn(2, 2);
echo $umn . '<br>';

function del($a, $b) {

    $a = (int)$a;
    $b = (int) $b;

    if ($b === 0) {
        return 'на ноль делить нельзя';
    }
    return $a / $b;
}
$del = del(20, '0');
echo $del . '<br>';

//Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
//где $arg1, $arg2 – значения аргументов,
//$operation – строка с названием операции .
//В зависимости от переданного значения операции выполнить одну из арифметических
//операций(использовать функции из пункта 3) и вернуть полученное значение(использовать switch).


function mathOperation($arg1, $arg2, $operation) {
    switch ($operation){
        case 'cложение':
            echo summ($arg1, $arg2);
            break;
        case 'умножение':
            echo umn($arg1, $arg2);
            break;
        case 'деление':
            echo del($arg1, $arg2);
            break;
        case 'вычетание':
            echo razn($arg1, $arg2);
            break;
        default:
            echo 'неизвестнаыя операция';
            break;
    }
}
mathOperation(2, 8, 'cложение');


//вывести текущий год при помощи встроенных функций PHP.

echo date("Y");
//*С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.


function power ($val, $pow) {
    if ($pow == 0) {
        return 1;
    }
    return $val * power($val, $pow-1);
}

echo power(2, 3);


//*Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например: 22 часа 15 минут, 21 час 43 минуты.


$curentDate = new DateTime();
$hour = 121;
$minutes = $curentDate->format('i');

$data = [
    0 => 'час',
    1 =>' часа',
    2 => 'часов'
];

$data2 = [
    0 => 'минута',
    1 =>' минуты',
    2 => 'минут'
];

function getNumEnding($number, $endingArray) {

    if ($number>=11 && $number<=19) {
        $ending=$endingArray[2];
    }
    else {
        $i = $number % 10;
        switch ($i)
        {
            case (1): $ending = $endingArray[0]; break;
            case (2):
            case (3):
            case (4): $ending = $endingArray[1]; break;
            default: $ending=$endingArray[2];
        }
    }
    return $ending;
}

echo 'сейчас ' . $hour . getNumEnding($hour, $data) . ' ' . $minutes . ' ' . getNumEnding($minutes, $data2);


