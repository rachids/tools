<?php

namespace Tests\Unit\Service\Date;

use App\Service\Date\DateUtils;
use PHPUnit\Framework\TestCase;

class DateUtilsTest extends TestCase
{
    public function test_it_returns_difference_between_two_dates_in_days()
    {
        // Given two carbon dates
        $start = now();
        $end = now()->addDay();

        // And a DateUtils object
        $dateUtils = new DateUtils($start, $end);

        // When getting the difference
        $actual = $dateUtils->getDifference();

        // Then it should return the expected result
        $this->assertEquals(1, $actual);
    }

    public function test_it_returns_difference_between_two_dates_in_hours()
    {
        // Given two carbon dates
        $start = now();
        $end = now()->addDay();

        // And a DateUtils object
        $dateUtils = new DateUtils($start, $end);

        // When getting the difference
        $actual = $dateUtils->getDifference(DateUtils::HOURS_UNIT);

        // Then it should return the expected result
        $this->assertEquals(24, $actual);
    }

    public function test_it_creates_a_dateutils_with_string()
    {
        // Given two string
        $start = '2021-09-24';
        $end = '2021-10-16';

        // When calling the static creator
        $actual = DateUtils::makeFromString($start, $end);

        // Then it should be a date utils object
        $this->assertInstanceOf(DateUtils::class, $actual);
    }
}
