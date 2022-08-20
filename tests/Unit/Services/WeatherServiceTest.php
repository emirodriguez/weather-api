<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Models\Weather;
use App\Services\WeatherService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Infrastructure\Weather\Responses\CurrentWeatherResponse;
use Infrastructure\Weather\WeatherAPI;
use Tests\TestCase;

class WeatherServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGetCurrentFromDatabase(): void
    {
        $sut = new WeatherService($this->mock(WeatherAPI::class));

        $weather = Weather::factory()->create();

        $result = $sut->getCurrent($weather->query);

        $this->assertNotEmpty($result);
        $this->assertEquals($weather->temperature, $result->temperature);
        $this->assertEquals($weather->description, $result->description);
    }

    public function testGetCurrentFromApi(): void
    {
        $weatherResponse = new CurrentWeatherResponse(
            '07:00 AM',
            30,
            'Sunny',
            10,
            2,
            'N',
            100,
            0,
            23,
            1,
            32,
            5,
            1,
        );

        $weatherApi = $this->mock(WeatherAPI::class);
        $weatherApi->shouldReceive('getCurrent')
            ->once()
            ->with('New York')
            ->andReturn($weatherResponse);

        $sut = new WeatherService($weatherApi);

        $result = $sut->getCurrent('New York');

        $this->assertNotEmpty($result);
        $this->assertEquals(30, $result->temperature);
        $this->assertEquals('Sunny', $result->description);
    }
}
