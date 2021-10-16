<?php

namespace Tests\Unit\Service\Random;

use App\Service\Random\DiceUtil;
use PHPUnit\Framework\TestCase;

class DiceUtilTest extends TestCase
{
    public function test_it_returns_a_random_number()
    {
        // Given a dice object
        $diceUtil = new DiceUtil();

        // When getting a random number
        $actual = $diceUtil->generateRandomNumber();

        // Then it should get a random number
        $this->assertGreaterThanOrEqual(1, $actual);
        $this->assertLessThanOrEqual(100, $actual);
    }
}
