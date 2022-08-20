<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InvalidArgumentException;

class WeatherController extends Controller
{
    public function __construct(
        private WeatherService $weatherService
    ) {
    }

    public function current(Request $request): JsonResponse
    {
        $query = $request->query('query');
        if (empty($query)) {
            return response()->json(['error' => 'Missing query parameter'], 401);
        }

        $weather = $this->weatherService->getCurrent($query);

        return response()->json([$weather]);
    }
}
