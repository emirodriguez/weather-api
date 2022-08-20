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
        $this->attributes['query'] = $query;
    }

    public function setObservationTime(string $observationTime): void
    {
        $this->attributes['observation_time'] = $observationTime;
    }

    public function setTemperature(float $temperature): void
    {
        $this->attributes['temperature'] = $temperature;
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function setWindSpeed(int $windSpeed): void
    {
        $this->attributes['wind_speed'] = $windSpeed;
    }

    public function setWindDegree(int $windDegree): void
    {
        $this->attributes['wind_degree'] = $windDegree;
    }

    public function setWindDir(string $windDir): void
    {
        $this->attributes['wind_dir'] = $windDir;
    }

    public function setPressure(int $pressure): void
    {
        $this->attributes['pressure'] = $pressure;
    }

    public function setPrecip(int $precip): void
    {
        $this->attributes['precip'] = $precip;
    }

    public function setHumidity(int $humidity): void
    {
        $this->attributes['humidity'] = $humidity;
    }

    public function setCloudCover(int $cloudCover): void
    {
        $this->attributes['cloudcover'] = $cloudCover;
    }

    public function setFeelsLike(float $feelsLike): void
    {
        $this->attributes['feels_like'] = $feelsLike;
    }

    public function setUvIndex(int $uvIndex): void
    {
        $this->attributes['uv_index'] = $uvIndex;
    }

    public function setVisibility(int $visibility): void
    {
        $this->attributes['visibility'] = $visibility;
    }
}
