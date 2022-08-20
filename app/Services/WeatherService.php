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
        $weather->setQuery($query);
        $weather->setObservationTime($response->getObservationTime());
        $weather->setTemperature($response->getTemperature());
        $weather->setDescription($response->getDescription());
        $weather->setWindSpeed($response->getWindSpeed());
        $weather->setWindDegree($response->getWindDegree());
        $weather->setWindDir($response->getWindDir());
        $weather->setPressure($response->getPressure());
        $weather->setPrecip($response->getPrecip());
        $weather->setHumidity($response->getHumidity());
        $weather->setCloudCover($response->getCloudCover());
        $weather->setFeelsLike($response->getFeelsLike());
        $weather->setUvIndex($response->getUvIndex());
        $weather->setVisibility($response->getVisibility());

        return $weather;
    }
}
