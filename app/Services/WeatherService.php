<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Weather;
use DateTime;
use Infrastructure\Weather\WeatherAPI;

class WeatherService
{
    public function __construct(
        private WeatherAPI $weatherAPI
    ) {
    }

    public function getCurrent(string $query): Weather
    {
        // Check if exist weather from 1 hour ago
        $weather = Weather::where('query', $query)->where('created_at', '>', new DateTime('-1 hour'))->orderBy('id', 'DESC')->first();
        if ($weather) {
            return $weather;
        }

        $weather = $this->getFromAPI($query);
        $weather->save();

        return $weather;
    }

    private function getFromAPI(string $query): Weather
    {
        $response = $this->weatherAPI->getCurrent($query);

        $weather = new Weather();
        $weather->query = $query;
        $weather->observation_time = $response->getObservationTime();
        $weather->temperature = $response->getTemperature();
        $weather->description = $response->getDescription();
        $weather->wind_speed = $response->getWindSpeed();
        $weather->wind_degree  = $response->getWindDegree();
        $weather->wind_dir = $response->getWindDir();
        $weather->pressure = $response->getPressure();
        $weather->precip = $response->getPrecip();
        $weather->humidity = $response->getHumidity();
        $weather->cloudcover = $response->getCloudCover();
        $weather->feels_like = $response->getFeelsLike();
        $weather->uv_index = $response->getUvIndex();
        $weather->visibility = $response->getVisibility();

        return $weather;
    }
}
