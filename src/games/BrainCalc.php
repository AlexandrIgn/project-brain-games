<?php

namespace BrainGames\BrainCalc;

use function \cli\line;
use function \cli\prompt;

function makeCalc(int $num1, int $num2, $operator): int
{
    switch ($operator) {
        case '*':
            return $result = $num1 * $num2;
            break;
        case '+':
            return $result = $num1 + $num2;
            break;
        case '-':
            return $result = $num1 - $num2;
            break;
    }
}

function run()
{
    line('Welcome to the Brain Games!');
    line("What is the result of the expression?\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $operators = ['*', '+', '-'];
    $numberOfQuestions = 3;
    for ($i = 1; $i <= $numberOfQuestions; $i++) {
        $randomOperators = $operators[array_rand($operators)];
        $randomNum1 = rand(1, 9);
        $randomNum2 = rand(1, 9);
        $question = "{$randomNum1} {$randomOperators} {$randomNum2}";
        line("Question: %s", $question);
        $correctAnswer = makeCalc($randomNum1, $randomNum2, $randomOperators);
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
