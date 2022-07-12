#!/usr/bin/env php
<?php

namespace Brain\Games\Calc;

const DESCRIPTION = "What is the result of the expression? (for division - the integer part of division)";
const NUMBER_RANGE = 50;
const OPERATIONS = ['+', '-', '*'];

function play()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $num1 = rand(0, NUMBER_RANGE);
        $num2 = rand(0, NUMBER_RANGE);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $question = "{$num1} {$operation} {$num2}";
        $questionsAndAnswers[] = ['question' => $question, 'answer' => calculate($num1, $num2, $operation)];
    }
    run($questionsAndAnswers, DESCRIPTION);
}

function calculate(int $num1, int $num2, string $operation)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception("Unknown operator: {$operation}");
    }
}
