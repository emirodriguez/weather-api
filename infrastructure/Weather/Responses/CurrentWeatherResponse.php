<?php

declare(strict_types=1);

namespace Infrastructure\Weather\Responses;

class CurrentWeatherResponse
{
    public function __construct(
        private string $observationTime,
        private float $temperature,
        private string $description,
        private int $windSpeed,
        private int $windDegree,
        private string $windDir,
        private int $pressure,
        private int $precip,
        private int $humidity,
        private int $cloudCover,
        private float $feelsLike,
        private int $uvIndex,
        private int $visibility,
    ) {
    }

    public function getObservationTime(): string
    {
        return $this->observationTime;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getWindSpeed(): int
    {
        return $this->windSpeed;
    }

    public function getWindDegree(): int
    {
        return $this->windDegree;
    }

    public function getWindDir(): string
    {
        return $this->windDir;
    }

    public function getPressure(): int
    {
        return $this->pressure;
    }

    public function getPrecip(): int
    {
        return $this->precip;
    }

    public function getHumidity(): int
    {
        return $this->humidity;
    }

    public function getCloudCover(): int
    {
        return $this->cloudCover;
    }

    public function getFeelsLike(): float
    {
        return $this->feelsLike;
    }

    public function getUvIndex(): int
    {
        return $this->uvIndex;
    }

    public function getVisibility(): int
    {
        return $this->visibility;
    }
}
