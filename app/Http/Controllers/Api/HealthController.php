<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class HealthController extends Controller
{
    public function __invoke(): JsonResponse
    {
        \Log::info('health_check_hit');
        try {
            DB::select('SELECT 1');

            return response()->json([
                'status' => 'ok',
                'db' => 'ok',
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'status' => 'error',
                'db' => 'error',
            ], 500);
        }
    }
}
