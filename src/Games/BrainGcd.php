#!/usr/bin/env php
<?php

namespace Brain\Games\Gcd;

const MESSAGE = "Find the greatest common divisor of given numbers.";
const NUMBER_RANGE = 1000;
const NUMBER_OF_QUESTION = 3;

function generateQuestions(int $numberOfQuestions): array
{
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $num1 = rand(0, NUMBER_RANGE);
        $num2 = rand(0, NUMBER_RANGE);
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
