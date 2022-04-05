<?php

/**
 * @getRandomQuestion()
 */

use function cli\line;
use function cli\prompt;

 require_once 'vendor/autoload.php';

 function sayHello(string $gameName): string {
     line("Welcome to the $gameName!");
     $name = prompt('May I have your name?');
     line("Hello, %s!", $name);
     return $name;
 }

 function gameCycle(string $name, array $questions, string $message) {
     line($message);
     $message = "Congratulations, %s!";
     for ($i = 0; $i < count($questions); $i++) {
         $question = $questions[$i][0];
         line("Question: %s", $question);
         $answer = prompt('Your answer: ');
         $rightAnswer = $questions[$i][1];
         if ($answer != $rightAnswer) {
             line("'%1s' is wrong answer ;(. Correct answer was '%2s'.", $answer, $rightAnswer);
             $message = "Let's try again, %s!";
             break;
         }
         line("Correct!");
     }
     line($message, $name);
 }

