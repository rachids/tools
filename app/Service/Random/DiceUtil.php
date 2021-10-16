<?php

namespace App\Service\Random;

class DiceUtil
{
    public function generateRandomNumber(int $min = 1, int $max = 100): int
    {
        return mt_rand($min, $max);
    }
}
