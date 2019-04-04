<?php

namespace BrainGames\BrainCalc;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;

function makeCalc(int $num1, int $num2, $operator): int
{
    switch ($operator) {
        case '*':
            return $num1 * $num2;
            break;
        case '+':
            return $num1 + $num2;
            break;
        case '-':
            return $num1 - $num2;
            break;
    }
}
function runBrainCalc()
{
    $annotation = 'What is the result of the expression?\n.';
    $getQuestionAndAnswer = function () {
        $operators = ['*', '+', '-'];
        $randomOperators = $operators[array_rand($operators)];
        $randomNum1 = rand(1, 9);
        $randomNum2 = rand(1, 9);
        $question = "{$randomNum1} {$randomOperators} {$randomNum2}";
        $answer = makeCalc($randomNum1, $randomNum2, $randomOperators);
        return [$question, $answer];
    };
    run($getQuestionAndAnswer, $annotation);
}
