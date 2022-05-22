#!/usr/bin/env php
<?php

namespace Brain\Games\Calc;

const DESCRIPTION = "What is the result of the expression? (for division - the integer part of division)";
const NUMBER_RANGE = 50;
const OPERATIONS = ['+', '-', '*'];

function generateQuestions(int $numberOfQuestions): array
{
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $num1 = rand(0, NUMBER_RANGE);
        $num2 = rand(0, NUMBER_RANGE);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $questions["$num1 $operation $num2"] = calc($num1, $num2, $operation);
    }
    return $questions;
}

function calc(int $num1, int $num2, string $operation)
{
    $rightAnswer = 0;
    switch ($operation) {
        case '+':
            $rightAnswer = $num1 + $num2;
            break;
        case '-':
            $rightAnswer = $num1 - $num2;
            break;
        case '*':
            $rightAnswer = $num1 * $num2;
            break;
        default:
            throw new \Exception("Unknown operator: {$operation}");
    }
    return $rightAnswer;
}

function play()
{
    $questions = generateQuestions(NUMBER_OF_QUESTION);
    run($questions, DESCRIPTION);
}
