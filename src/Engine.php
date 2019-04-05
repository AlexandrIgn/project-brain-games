<?php

namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

const NUMBER_OF_QUESTION = 3;

function run($getQuestionAndAnswer, $annotation)
{
    line('Welcome to the Brain Games!');
    line($annotation);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($i = 1; $i <= NUMBER_OF_QUESTION; $i++) {
        [$question, $correctAnswer] = $getQuestionAndAnswer();
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, %s", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
