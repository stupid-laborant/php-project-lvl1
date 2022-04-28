#!/usr/bin/env php
<?php

namespace Brain\Games\Prime;

const MESSAGE = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
const NUMBER_MIN = 50;
const NUMBER_MAX = 500;
const NUMBER_OF_QUESTION = 3;

function generateQuestions(int $numberOfQuestion): array
{
    $questions = [];
    $range = rand(NUMBER_MIN, NUMBER_MAX);
    $primeNumbers = findPrimeNumbers($range);
    for ($i = 0; $i < $numberOfQuestion; $i++) {
        $num = rand(0, $range);
        $questions[$num] = check($primeNumbers[$num]);
    }
    return $questions;
}


function isExist($element): bool
{
    return $element != 0;
}

function check($element): string
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

function play()
{
    $questions = generateQuestions(NUMBER_OF_QUESTION);
    run($questions, MESSAGE);
}
