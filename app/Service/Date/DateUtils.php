<?php

namespace App\Service\Date;

use Carbon\Carbon;

class DateUtils
{
    const DAY_UNIT = 0;
    const HOURS_UNIT = 1;

    public function __construct(
        private Carbon $startDate,
        private ?Carbon $endDate = null,
    )
    {
    }

    public static function makeFromString(string $startDateString, ?string $endDateString = null, string $format = 'Y-m-d'): self
    {
        $startDate = Carbon::createFromFormat($format, $startDateString);
        $endDate = Carbon::now();

        if ($endDateString) {
            $endDate = Carbon::createFromFormat($format, $endDateString);
        }

        return new self($startDate, $endDate);
    }

    public function getDifference(int $unit = self::DAY_UNIT): int
    {
        $value = $this->startDate->diffInDays($this->endDate);
        return match ($unit) {
            self::HOURS_UNIT => $value * 24,
            default => $value,
        };
    }
}
