<?php

namespace BrainGames\games\Prime;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;

const ANNOTATION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}
function runPrime()
{
    $getQuestionAndAnswer = function () {
        $question = rand(1, 99);
        $answer = isPrime($question) ? 'yes' : 'no';
        return [$question, $answer];
    };
    run($getQuestionAndAnswer, ANNOTATION);
}
