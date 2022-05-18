#!/usr/bin/env php
<?php

namespace Brain\Games\Even;

const DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function generateQuestions(int $numberOfQuestions): array
{
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $num = rand();
        $questions[$num] = check($num);
    }
    return $questions;
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function check(int $num): string
{
    return isEven($num) ? 'yes' : 'no';
}

function play()
{
    $questions = generateQuestions(NUMBER_OF_QUESTION);
    run($questions, DESCRIPTION);
}
