<?php

namespace BrainGames\Progression;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;

const ANNOTATION =  'What number is missing in the progression?';
const LENGTH_PROGRESSION = 10;

//Euclidean algorithm
function getProgression()
{
    $progression = [];
    $beginNumberProgrission = rand(1, 99);
    $stepProgression = rand(1, 5);
    for ($i = 0; $i < LENGTH_PROGRESSION; $i++) {
        $progression[] = $beginNumberProgrission + $stepProgression * $i;
    }
    return $progression;
}
function runProgression()
{
    $getQuestionAndAnswer = function () {
        $progression = getProgression();
        $randomKeyOfProgression = array_rand($progression);
        $answer = $progression[$randomKeyOfProgression];
        $progression[$randomKeyOfProgression] = '...';
        $question = implode(' ', $progression);
        return [$question, $answer];
    };
    run($getQuestionAndAnswer, ANNOTATION);
}
