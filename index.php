<?php

function task_1 ($a=-5, $b=-3)
{
    if($a >= 0 || $b >= 0) {
        return $a - $b;
    }

    if($a < 0 || $b < 0) {
        return $a * $b;
    }

    return $a + $b;
}

echo task_1();

echo '<hr>';
//task 2----------------------------------

$a = 2;

switch ($a):
    case 0:
        echo ($a++) . ' ';
    case 1:
        echo ($a++) . ' ';
    case 2:
        echo ($a++) . ' ';
    case 3:
        echo ($a++) . ' ';
    case 4:
        echo ($a++) . ' ';
    case 5:
        echo ($a++) . ' ';
    case 6:
        echo ($a++) . ' ';
    case 7:
        echo ($a++) . ' ';
    case 8:
        echo ($a++) . ' ';
    case 9:
        echo ($a++) . ' ';
    case 10:
        echo ($a++) . ' ';
    case 11:
        echo ($a++) . ' ';
    case 12:
        echo ($a++) . ' ';
    case 13:
        echo ($a++) . ' ';
    case 14:
        echo ($a++) . ' ';
    case 15:
        echo ($a++) . ' ';
endswitch;

echo '<hr>';
//task 3----------------------------------

function calcSum ($a, $b)
{
    return $a + $b;
}

function calcSub ($a, $b)
{
    return $a - $b;
}

function calcMul ($a, $b)
{
    return $a * $b;
}

function calcDiv ($a, $b)
{
    return $a / $b;
}

echo '<hr>';
//task 4----------------------------------

function mathOperation($arg1, $arg2, $operation)
{
    switch($operation):
        case sum:
            echo calcSum($arg1, $arg2);
            break;
        case sub:
            echo calcSub($arg1, $arg2);
            break;
        case mul:
            echo calcMul($arg1, $arg2);
            break;
        case div:
            echo calcDiv($arg1, $arg2);
            break;
    endswitch;
}

mathOperation(3, 5, mul);

echo '<hr>';
//task 5----------------------------------

$today = date("Y");
$html = "
        <!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <title>Title</title>
            <style>
                footer {    
                	position: absolute;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                    height: 40px;
                    background: #ccc;
                    text-align: center; 
                    line-height: 40px;
                }
            </style>
        </head>
        <body>
            <div class='container'></div>
            <footer>$today</footer>
        </body>
        </html>
        ";

echo $html;

//task 6----------------------------------
echo '<hr>';

function power ($val, $pow) {
    if($pow === 0) {
        return 1;
    }
    $pow--;
    $calc = power ($val, $pow) * $val;
    return $calc;
}

echo power (2, 4);

//task 7----------------------------------
echo '<hr>';

$time = time();
$date = '2020-03-26';

$hour = date('H', strtotime($date));
$minute = date('i', $time);

function getName ($value, $a = 'час', $b='часа', $c = 'часов') {
    if($value > 20) {
        $value %= 10;
    }
    if($value == 1) {
        return $a;
    }
    if($value > 1 && $value < 5) {
        return $b;
    }
    return $c;
}

getName(60, $a = 'минута', $b='минуты', $c = 'минут');

echo $hour . getName($hour) . ' ' . $minute . getName(60, $a = 'минута', $b='минуты', $c = 'минут');
