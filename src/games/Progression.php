<?php

namespace BrainGames\games\Progression;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;

const ANNOTATION =  'What number is missing in the progression?';
const LENGTH_PROGRESSION = 10;

function makeProgression()
{
    $progression = [];
    $start = rand(1, 99);
    $step = rand(1, 5);
    for ($i = 0; $i < LENGTH_PROGRESSION; $i++) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}

function runProgression()
{
    $getQuestionAndAnswer = function () {
        $progression = makeProgression();
        $randomKeyOfProgression = array_rand($progression);
        $answer = $progression[$randomKeyOfProgression];
        $progression[$randomKeyOfProgression] = '...';
        $question = implode(' ', $progression);
        return [$question, $answer];
    };
    run($getQuestionAndAnswer, ANNOTATION);
}
