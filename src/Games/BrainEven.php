#!/usr/bin/env php
<?php

namespace Brain\Games\Even;

const DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function play()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $num = rand();
        $questionsAndAnswers[] = ['question' => $num, 'answer' => isEven($num) ? 'yes' : 'no'];
    }
    run($questionsAndAnswers, DESCRIPTION);
}

function isEven(int $num): bool
{
    return $num % 2 == 0;
}
