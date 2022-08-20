<?php

declare(strict_types=1);

namespace Infrastructure\Weather;

use Infrastructure\Weather\Responses\CurrentWeatherResponse;

interface WeatherAPI
{
    public function getCurrent(string $query): CurrentWeatherResponse;
}
