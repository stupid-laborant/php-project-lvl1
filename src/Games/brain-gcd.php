#!/usr/bin/env php
<?php

namespace Brain\Games\Gcd;

const MESSAGE = "Find the greatest common divisor of given numbers.";

require_once 'vendor/autoload.php';

function generateQuestions(int $numberOfQuestions): array
{
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $num1 = rand(0, 1000);
        $num2 = rand(0, 1000);
        $answer = findNcd($num1, $num2);
        $questions["$num1 $num2"] = $answer;
    }
    return $questions;
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

function play()
{
    $questions = generateQuestions(NUMBER_OF_QUESTION);
    run($questions, MESSAGE);
}
