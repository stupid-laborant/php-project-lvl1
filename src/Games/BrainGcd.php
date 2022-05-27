#!/usr/bin/env php
<?php

namespace Brain\Games\Gcd;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";
const NUMBER_RANGE = 1000;

function play()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $num1 = rand(1, NUMBER_RANGE);
        $num2 = rand(1, NUMBER_RANGE);
        $answer = findNcd($num1, $num2);
        $questionsAndAnswers[] = ['question' => "{$num1} {$num2}", 'answer' => $answer];
    }
    run($questionsAndAnswers, DESCRIPTION);
}

function findNcd(int $num1, int $num2): int
{
    $divisible = max($num1, $num2);
    $divisor = min($num1, $num2);
    $remainder = $divisible % $divisor;
    while ($remainder > 0) {
        $divisible = $divisor;
        $divisor = $remainder;
        $remainder = $divisible % $divisor;
    }
    return $divisor;
}
