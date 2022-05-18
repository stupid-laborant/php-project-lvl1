#!/usr/bin/env php
<?php

namespace Brain\Games\Progression;

const DESCRIPTION = "What number is missing in the progression?";
const MAX_FIRST_ELEMENT = 20;
const MAX_DIFFERENCE = 20;
const MIN_NUMBER_OF_ELEMENTS = 5;
const MAX_NUMBER_OF_ELEMENTS = 15;

function generateQuestions(int $numberOfQuestions): array
{
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $element = rand(0, MAX_FIRST_ELEMENT);
        $diff = rand(1, MAX_DIFFERENCE);
        $numOfElements = rand(MIN_NUMBER_OF_ELEMENTS, MAX_NUMBER_OF_ELEMENTS);
        $position = rand(0, $numOfElements - 1);
        $question = "";
        $rightAnswer = null;
        for ($j = 0; $j < $numOfElements; $j++) {
            if ($j == $position) {
                $question .= ".. ";
                $rightAnswer = $element;
            } else {
                $question .= "$element ";
            }
            $element += $diff;
        }
        $questions[$question] = $rightAnswer;
    }
    return $questions;
}

function play()
{
    $questions = generateQuestions(NUMBER_OF_QUESTION);
    run($questions, DESCRIPTION);
}
