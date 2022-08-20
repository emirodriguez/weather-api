<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'created_at', 'updated_at', 'query'];

    private string $query;
    private string $observationTime;
    private float $temperature;
    private string $description;
    private int $windSpeed;
    private int $windDegree;
    private string $windDir;
    private int $pressure;
    private int $precip;
    private int $humidity;
    private int $cloudCover;
    private float $feelsLike;
    private int $uvIndex;
    private int $visibility;

    public function setQuery(string $query): void
    {
        $this->query = $query;
    }

    public function setObservationTime(string $observationTime): void
    {
        $this->observationTime = $observationTime;
    }

    public function setTemperature(float $temperature): void
    {
        $this->temperature = $temperature;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setWindSpeed(int $windSpeed): void
    {
        $this->windSpeed = $windSpeed;
    }

    public function setWindDegree(int $windDegree): void
    {
        $this->windDegree = $windDegree;
    }

    public function setWindDir(string $windDir): void
    {
        $this->windDir = $windDir;
    }

    public function setPressure(int $pressure): void
    {
        $this->pressure = $pressure;
    }

    public function setPrecip(int $precip): void
    {
        $this->precip = $precip;
    }

    public function setHumidity(int $humidity): void
    {
        $this->humidity = $humidity;
    }

    public function setCloudCover(int $cloudCover): void
    {
        $this->cloudCover = $cloudCover;
    }

    public function setFeelsLike(float $feelsLike): void
    {
        $this->feelsLike = $feelsLike;
    }

    public function setUvIndex(int $uvIndex): void
    {
        $this->uvIndex = $uvIndex;
    }

    public function setVisibility(int $visibility): void
    {
        $this->visibility = $visibility;
    }
}
