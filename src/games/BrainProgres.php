<?php

namespace BrainGames\BrainProgres;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;

const ANNOTATION =  'What number is missing in the progression?';

//Euclidean algorithm
function getProgression()
{
    $progression = [];
    for ($i = rand(1, 99); count($progression) <= 10; $i = $i + 2) {
        $progression[] = $i;
    }
    return $progression;
}
function runBrainProgres()
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
