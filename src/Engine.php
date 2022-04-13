<?php

/**
 * @getRandomQuestion()
 */

use function cli\line;
use function cli\prompt;

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
