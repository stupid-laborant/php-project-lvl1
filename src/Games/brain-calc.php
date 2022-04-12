#!/usr/bin/env php
<?php

const MESSAGE = "What is the result of the expression?";

require_once 'vendor/autoload.php';

function generateQuestions(int $numberOfQuestions): array
{
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $num1 = rand(0, 50);
        $num2 = rand(0, 50);
        $num3 = rand(1, 3);
        $action = "";
        $rightAnswer = 0;
        switch ($num3) {
            case 1:
                $action = "+";
                $rightAnswer = $num1 + $num2;
                break;
            case 2:
                $action = "-";
                $rightAnswer = $num1 - $num2;
                break;
            case 3:
                $action = "*";
                $rightAnswer = $num1 * $num2;
                break;
        }
        $questions["$num1 $action $num2"] = $rightAnswer;
    }
    return $questions;
}

function play()
{
    $questions = generateQuestions(NUMBER_OF_QUESTION);
    run($questions, MESSAGE);
}
