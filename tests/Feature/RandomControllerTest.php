<?php

namespace Tests\Feature;

use App\Service\Random\DiceUtil;
use Mockery\MockInterface;
use Tests\TestCase;

class RandomControllerTest extends TestCase
{
    public function test_it_show_a_random_number()
    {
        $this->mock(DiceUtil::class, function (MockInterface $mock) {
            return $mock->shouldReceive('generateRandomNumber')
                ->andReturn(3);
        });

        // Given a min and a max
        $payload = [
            'min' => 1,
            'max' => 10,
        ];

        // When submitting to the dice endpoint
        $response = $this->getJson(route('tools.random.dice', $payload));

        // Then it should return a random value
        $response->assertStatus(200);
        $response->assertJson([
            'data' => 3
        ]);
    }

    public function test_it_show_random_item_in_array()
    {
        // Given an array of items
        $payload = [
            'items' => [
                'apple',
                'strawberry',
                'kiwi',
                'pineapple',
                'banana',
                'olive',
            ],
        ];

        // When submitting to the pick endpoint
        $response = $this->getJson(route('tools.random.pick', $payload));

        // Then it should return a random value
        $response->assertStatus(200);
        //TODO : Find a way to test this behaviour :grimacing:
    }
}
