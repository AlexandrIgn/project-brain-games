<?php

namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;

function isEven($num)
{
    return $num % 2 === 0;
}

function run()
{
    line('Welcome to the Brain Games!');
    line("Answer \"yes\" if number even otherwise answer \"no\".\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $numberOfQuestions = 3;
    for ($i = 1; $i <= $numberOfQuestions; $i++) {
        $question = rand(1, 99);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
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
