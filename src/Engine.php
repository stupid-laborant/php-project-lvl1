<?php

use function cli\line;
use function cli\prompt;

const NUMBER_OF_QUESTIONS = 3;

function run(array $questionsAndAnswers, string $gameDescription)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($gameDescription);
    $message = "Congratulations, %s!";
    foreach ($questionsAndAnswers as $task) {
        line("Question: %s", $task['question']);
        $answer = prompt("Your answer: ");
        $rightAnswer = $task['answer'];
        if ($answer != $rightAnswer) {
            line("'%1s' is wrong answer ;(. Correct answer was '%2s'.", $answer, $rightAnswer);
            $message = "Let's try again, %s!";
            break;
        }
        line("Correct!");
    }
    line($message, $name);
}
