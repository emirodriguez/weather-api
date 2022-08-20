<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Infrastructure\Weather\WeatherAPI;
use Infrastructure\Weather\WeatherStackAPI;

class WeatherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(WeatherAPI::class, WeatherStackAPI::class);
    }
}
