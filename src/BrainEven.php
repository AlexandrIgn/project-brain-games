<?php

namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;

function isEven($num)
{
    return $num % 2 === 0;
}
function getCorrectAnswer($num)
{
    return isEven($num) ? 'yes' : 'no';
}
function run()
{
    line('Welcome to the Brain Games!');
    line("Answer \"yes\" if number even otherwise answer \"no\".\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $questionСounter = 0;
    for ($i = 1; $i <= 3; $i++) {
        $randomNum = rand(1, 99);
        line("Question: %s", $randomNum);
        $correctAnswer = getCorrectAnswer($randomNum);
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
            $questionСounter += 1;
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, %s", $name);
            break;
        }
        if ($questionСounter === 3) {
            line("Congratulations, %s!", $name);
        }
    }
}
