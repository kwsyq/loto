<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;


class LuckyNumbersTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $token = 'thisistheapikey';

        $headers["APIKEY-LUCKY-NUMBERS"] = $token;

        $response = $this->withHeaders($headers)->get('/api/luckynumbers');

        $response->assertOk();

        $resp=$response->json();

        $this->assertCount(6, $resp, "Array size must be 6");

        foreach ($resp as $element) {
            $this->assertLessThanOrEqual(90, $element, "At least one number is bigger than 90");
            $this->assertGreaterThanOrEqual(1, $element, "At least one number is less than 1");
        }

    }



}
