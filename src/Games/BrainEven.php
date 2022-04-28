#!/usr/bin/env php
<?php

namespace Brain\Games\Even;

const MESSAGE = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
const NUMBER_OF_QUESTION = 3;

function generateQuestions(int $numberOfQuestions): array
{
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $num = rand();
        $questions[$num] = check($num);
    }
    return $questions;
}

function isEven($num): bool
{
    return $num % 2 === 0;
}

function check($num): string
{
    return isEven($num) ? 'yes' : 'no';
}

function play()
{
    $questions = generateQuestions(NUMBER_OF_QUESTION);
    run($questions, MESSAGE);
}
