<?php

namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

function run($getQuestionAndAnswer, $annotation)
{
    line('Welcome to the Brain Games!');
    line($annotation);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $numberOfQuestions = 3;
    for ($i = 1; $i <= $numberOfQuestions; $i++) {
        $questionAndAnswer = $getQuestionAndAnswer();
        $question = $questionAndAnswer[0];
        $correctAnswer = $questionAndAnswer[1];
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
