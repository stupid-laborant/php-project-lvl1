#!/usr/bin/env php
<?php

namespace Brain\Games\Prime;

const DESCRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
const NUMBER_MIN = 50;
const NUMBER_MAX = 500;

function play()
{
    $questionsAndAnswers = [];
    $range = rand(NUMBER_MIN, NUMBER_MAX);
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $num = rand(0, $range);
        $questionsAndAnswers[] = ['question' => $num, 'answer' => isPrime($num) ? 'yes' : 'no'];
    }
    run($questionsAndAnswers, DESCRIPTION);
}

function isPrime(int $element): bool
{
    if ($element == 0 || $element == 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($element); $i++) {
        if ($element % $i == 0) {
            return false;
        }
    }
    return true;
}
