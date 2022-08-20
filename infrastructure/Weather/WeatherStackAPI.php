<?php

declare(strict_types=1);

namespace Infrastructure\Weather;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Infrastructure\Weather\Responses\CurrentWeatherResponse;

class WeatherStackAPI implements WeatherAPI
{
    private const BASE_API_URL = 'http://api.weatherstack.com/';

    public function __construct(
        private Client $httpClient
    ) {
    }

    public function getCurrent(string $query): CurrentWeatherResponse
    {
        $response = $this->httpClient->request(
            'GET',
            self::BASE_API_URL . '/current',
            [
                RequestOptions::QUERY => [
                    'access_key' => env('WEATHER_STACK_API_KEY'),
                    'query' => $query,
                ]
            ]
        );

        $body = json_decode((string)$response->getBody(), true);

        if (empty($body['current'])) {
            throw new \RuntimeException('Invalid weatherstack API response');
        }

        return new CurrentWeatherResponse(
            $body['current']['observation_time'],
            $body['current']['temperature'],
            $body['current']['weather_descriptions'][0] ?? '',
            $body['current']['wind_speed'],
            $body['current']['wind_degree'],
            $body['current']['wind_dir'],
            $body['current']['pressure'],
            (int)$body['current']['precip'],
            $body['current']['humidity'],
            $body['current']['cloudcover'],
            $body['current']['feelslike'],
            $body['current']['uv_index'],
            $body['current']['visibility'],
        );
    }
}
