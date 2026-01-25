<?php

namespace App\Http\Controllers;

use App\Services\Health\DatabaseHealthChecker;
use Illuminate\Http\JsonResponse;

class HealthController extends Controller
{
    public function __invoke(DatabaseHealthChecker $checker): JsonResponse
    {
        $dbOk = $checker->check();
        $latencyMs = $checker->getLatencyMs();

        return response()->json([
            'status' => $dbOk ? 'ok' : 'degraded',
            'app' => [
                'env' => config('app.env'),
                'debug' => (bool) config('app.debug'),
            ],
            'db' => [
                'ok' => $dbOk,
                'latency_ms' => $latencyMs,
                'driver' => config('database.default'),
            ],
        ], $dbOk ? 200 : 503);
    }
}
