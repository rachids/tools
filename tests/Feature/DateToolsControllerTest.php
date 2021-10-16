<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DateToolsControllerTest extends TestCase
{

    public function test_it_shows_diff_between_two_dates()
    {
        // Given a start date and an end date
        $startDate = now();
        $endDate = now()->addDays(5);

        $payload = [
            'start' => $startDate->format('Y-m-d'),
            'end' => $endDate->format('Y-m-d')
        ];

        // When submitting them to the date-diff endpoint
        $response = $this->getJson(route('tools.date.diff', $payload));

        // Then it should show the number of days of difference
        $response->assertStatus(200);
        $response->assertJson([
            'data' => $startDate->diffInDays($endDate)
        ]);
    }

    public function test_it_fails_with_end_date_before_start_date()
    {
        // Given a start date after the end date
        $startDate = now()->addDay();
        $endDate = now()->subDay();

        $payload = [
            'start' => $startDate->format('Y-m-d'),
            'end' => $endDate->format('Y-m-d'),
        ];

        // When submitting them to the date-diff endpoint
        $response = $this->getJson(route('tools.date.diff', $payload));

        // Then it should return 422
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['start', 'end']);
    }

    public function test_it_shows_counter_before_date()
    {
        // Given a date in the future
        $endDate = now()->addDays(2);

        $payload = [
            'target_date' => $endDate->format('Y-m-d'),
        ];

        // When submitting it to the show-counter endpoint
        $response = $this->getJson(route('tools.date.counter', $payload));

        // Then it should show the counter
        $response->assertStatus(200);
        $response->assertJson([
            'data' => 2,
        ]);
    }

    public function test_it_fails_with_target_date_before_now()
    {
        // Given a date in the past
        $endDate = now()->subDays(2);

        $payload = [
            'target_date' => $endDate->format('Y-m-d'),
        ];

        // When submitting it to the show-counter endpoint
        $response = $this->getJson(route('tools.date.counter', $payload));

        // Then it should return with error
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['target_date']);
    }
}
