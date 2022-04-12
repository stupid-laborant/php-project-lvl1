#!/usr/bin/env php
<?php

namespace Brain\Games\Prime;

const MESSAGE = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

require_once 'vendor/autoload.php';

function generateQuestions(int $numberOfQuestion): array
{
    $questions = [];
    $range = rand(50, 500);
    $primeNumbers = findPrimeNumbers($range);
    for ($i = 0; $i < $numberOfQuestion; $i++) {
        $num = rand(0, $range);
        $questions[$num] = $primeNumbers[$num] == 0 ? 'no' : 'yes';
    }
    return $questions;
}

function findPrimeNumbers(int $max): array
{
    $primeNumbers = [];
    for($i = 0; $i < $max; $i++) {
        $primeNumbers[$i] = $i;
    }
    $primeNumbers[1]=0;
    for ($j = 2; $j < $max; $j++)
    {
        if ($primeNumbers[$j] != 0) {
            for ($k = $j*$j; $k < $max; $k += $j) {
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