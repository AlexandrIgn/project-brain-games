<?php

namespace BrainGames\BrainCalc;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;

const ANNOTATION = 'What is the result of the expression?.';
const OPERATORS = ['*', '+', '-'];

function makeCalc(int $num1, int $num2, $operator): int
{
    switch ($operator) {
        case '*':
            return $num1 * $num2;
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
    }
}
function runBrainCalc()
{
    $getQuestionAndAnswer = function () {
        $operators = ['*', '+', '-'];
        $randomOperators = OPERATORS[array_rand(OPERATORS)];
        $randomNum1 = rand(1, 9);
        $randomNum2 = rand(1, 9);
        $question = "{$randomNum1} {$randomOperators} {$randomNum2}";
        $answer = makeCalc($randomNum1, $randomNum2, $randomOperators);
        return [$question, $answer];
    };
    run($getQuestionAndAnswer, ANNOTATION);
}
