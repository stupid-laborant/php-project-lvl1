#!/usr/bin/env php
<?php

namespace Brain\Games\BrainProgression;

const MESSAGE = "What number is missing in the progression?";

require_once 'vendor/autoload.php';

function generateQuestions(int $numberOfQuestions): array
{
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $element = rand(0, 100);
        $diff = rand(1, 99);
        $numOfElements = rand(5, 15);
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
    run($questions, MESSAGE);
}
