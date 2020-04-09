<?php

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

function mathOperation($arg1, $arg2, $operation)
{
    if ($operation == 'sum') {
        return calcSum($arg1, $arg2);
    }

    if ($operation == "sub") {
        return calcSub($arg1, $arg2);
    }

    if ($operation == "mul") {
        return calcMul($arg1, $arg2);
    }

    if ($operation == "div") {
        if($arg2 == 0) {
            return "На ноль делить нельзя";
        }
        return calcDiv($arg1, $arg2);
    }
}
