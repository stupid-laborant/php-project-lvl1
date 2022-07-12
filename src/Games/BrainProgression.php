#!/usr/bin/env php
<?php

namespace Brain\Games\Progression;

const DESCRIPTION = "What number is missing in the progression?";
const MAX_FIRST_ELEMENT = 20;
const MAX_DIFFERENCE = 20;
const MIN_NUMBER_OF_ELEMENTS = 5;
const MAX_NUMBER_OF_ELEMENTS = 15;

function play()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $element = rand(0, MAX_FIRST_ELEMENT);
        $diff = rand(1, MAX_DIFFERENCE);
        $numOfElements = rand(MIN_NUMBER_OF_ELEMENTS, MAX_NUMBER_OF_ELEMENTS);
        $position = rand(0, $numOfElements - 1);
        $rightAnswer = null;
        $sequence = [];
        for ($j = 0; $j < $numOfElements; $j++) {
            if ($j == $position) {
                $sequence[] = "..";
                $rightAnswer = $element;
            } else {
                $sequence[] = $element;
            }
            $element += $diff;
        }
        $questionsAndAnswers[] = ['question' => implode(" ", $sequence), 'answer' => $rightAnswer];
    }
    run($questionsAndAnswers, DESCRIPTION);
}
