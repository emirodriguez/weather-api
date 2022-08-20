<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Weather;
use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    public function testGetFromDatabaseOk(): void
    {
        $weather = Weather::factory()->create();

        $response = $this->get('/api/current?query=' .  $weather->query);

        $response->assertStatus(200);
    }
}
