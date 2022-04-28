<?php

/**
 * @getRandomQuestion()
 */

use function cli\line;
use function cli\prompt;

const HELLO = "Welcome to the Brain Games!";
const ASK_NAME = "May I have your name?";
const GREETING = "Hello, %s!";
const CONGRATULATION = "Congratulations, %s!";
const QUESTION_TEMPLATE = "Question: %s";
const ANSWER = "Your answer: ";
const MSG_WRONG_ANSWER = "'%1s' is wrong answer ;(. Correct answer was '%2s'.";
const MSG_TRY_AGAIN = "Let's try again, %s!";
const MSG_CORRECT = "Correct!";

function sayHello(): string
{
     line(HELLO);
     $name = prompt(ASK_NAME);
     line(GREETING, $name);
     return $name;
}

function playGame(string $name, array $questions, string $welcomeMessage)
{
    line($welcomeMessage);
    $message = CONGRATULATION;
    foreach ($questions as $question => $rightAnswer) {
        line(QUESTION_TEMPLATE, $question);
        $answer = prompt(ANSWER);
        if ($answer != $rightAnswer) {
            line(MSG_WRONG_ANSWER, $answer, $rightAnswer);
            $message = MSG_TRY_AGAIN;
            break;
        }
        line(MSG_CORRECT);
    }
    line($message, $name);
}

function run(array $questions, string $message)
{
    playGame(sayHello(), $questions, $message);
}
