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
    $primeNumbers = findPrimeNumbers($range);
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $num = rand(0, $range);
        $questionsAndAnswers[] = ['question' => $num, 'answer' => check($primeNumbers[$num] ?? 0)];
    }
    run($questionsAndAnswers, DESCRIPTION);
}


function isExist(int $element): bool
{
    return $element != 0;
}

function check(int $element): string
{
    return isExist($element) ? 'yes' : 'no';
}

function findPrimeNumbers(int $max): array
{
    $primeNumbers = [];
    for ($i = 0; $i < $max; $i++) {
        $primeNumbers[$i] = $i;
    }
    $primeNumbers[1] = 0;
    for ($j = 2; $j < $max; $j++) {
        if ($primeNumbers[$j] != 0) {
            for ($k = $j * $j; $k < $max; $k += $j) {
                $primeNumbers[$k] = 0;
            }
        }
    }
    return $primeNumbers;
}
