<?php

/**
 * @getRandomQuestion()
 */

use function cli\line;
use function cli\prompt;

const NUMBER_OF_QUESTION = 3;

function run(array $questions, string $welcomeMessage)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($welcomeMessage);
    $message = "Congratulations, %s!";
    foreach ($questions as $question => $rightAnswer) {
        line("Question: %s", $question);
        $answer = prompt("Your answer: ");
        if ($answer != $rightAnswer) {
            line("'%1s' is wrong answer ;(. Correct answer was '%2s'.", $answer, $rightAnswer);
            $message = "Let's try again, %s!";
            break;
        }
        line("Correct!");
    }
    line($message, $name);
}
