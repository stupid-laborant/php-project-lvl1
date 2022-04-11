#!/usr/bin/env php
<?php

namespace Brain\Games\BrainEven;

const MESSAGE = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

require_once 'vendor/autoload.php';

function generateQuestions(int $numberOfQuestions): array
{
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $num = rand();
        $questions[$num] = $num % 2 == 0 ? 'yes' : 'no';
    }
    return $questions;
}

function play()
{
    $questions = generateQuestions(NUMBER_OF_QUESTION);
    run($questions, MESSAGE);
}
