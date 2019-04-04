<?php

namespace BrainGames\BrainGsd;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;
//Euclidean algorithm
function getGcd($num1, $num2)
{
    while ($num1 != 0 && $num2 != 0) {
        if ($num1 > $num2) {
            $num1 = $num1 % $num2;
        } else {
            $num2 = $num2 % $num1;
        }
    }
    return abs($num1 + $num2);
}
function runBrainGsd()
{
    $annotation = 'Find the greatest common divisor of given numbers.';
    $getQuestionAndAnswer = function () {
        $num1 = rand(1, 15);
        $num2 = rand(1, 15);
        $question = "{$num1} {$num2}";
        $answer = getGcd($num1, $num2);
        return [$question, $answer];
    };
    run($getQuestionAndAnswer, $annotation);
}
