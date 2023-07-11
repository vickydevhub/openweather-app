<?php

namespace Tests\Unit;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ThrottlingTest extends TestCase
{
    public function testApiRateLimiting()
    {
        // Configure rate limit
        config(['throttle.enabled' => true]);
        config(['throttle.attempts' => 5]);
        config(['throttle.decay_minutes' => 1]);

        // Simulate exceeding rate limit
        for ($i = 1; $i <= 6; $i++) {
            $response = $this->getJson('/api/v1/weather');
            if ($i <= 5) {
                $response->assertStatus(Response::HTTP_OK);
            } else {
                $response->assertStatus(Response::HTTP_TOO_MANY_REQUESTS);
            }
        }

        // Wait for the rate limit to reset
        sleep(61);

        // Verify rate limit has been reset
        $response = $this->getJson('/api/v1/weather');
        $response->assertStatus(Response::HTTP_OK);
    }
}
