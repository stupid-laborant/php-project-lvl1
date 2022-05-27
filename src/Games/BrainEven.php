#!/usr/bin/env php
<?php

namespace Brain\Games\Even;

const DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function play()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $num = rand();
        $questionsAndAnswers[] = ['question' => $num, 'answer' => check($num)];
    }
    run($questionsAndAnswers, DESCRIPTION);
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function check(int $num): string
{
    return isEven($num) ? 'yes' : 'no';
}
