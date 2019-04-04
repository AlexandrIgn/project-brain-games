<?php

namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;

function isEven($num)
{
    return $num % 2 === 0;
}
function runBrainEven()
{
    $annotation = 'Answer "yes" if number even otherwise answer "no".';
    $getQuestionAndAnswer = function () {
        $question = rand(1, 99);
        $answer = isEven($question) ? 'yes' : 'no';
        return [$question, $answer];
    };
    run($getQuestionAndAnswer, $annotation);
}
