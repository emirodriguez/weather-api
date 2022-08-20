<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Weather;
use Infrastructure\Weather\WeatherAPI;

class WeatherService
{
    public function __construct(
        private WeatherAPI $weatherAPI
    ) {
    }

    public function getCurrent(string $query): Weather
    {
        $response = $this->weatherAPI->getCurrent($query);

        $weather = new Weather();
        $weather->observationTime = $response->getObservationTime();
        $weather->temperature = $response->getTemperature();
        $weather->description = $response->getDescription();
        $weather->windSpeed = $response->getWindSpeed();
        $weather->windDegree  = $response->getWindDegree();
        $weather->windDir = $response->getWindDir();
        $weather->pressure = $response->getPressure();
        $weather->precip = $response->getPrecip();
        $weather->humidity = $response->getHumidity();
        $weather->cloudcover = $response->getCloudCover();
        $weather->feelksLike = $response->getFeelsLike();
        $weather->uvIndex = $response->getUvIndex();
        $weather->visibility = $response->getVisibility();

        return $weather;
    }
}
