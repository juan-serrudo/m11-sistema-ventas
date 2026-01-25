<?php

namespace App\Services\Health;

use Illuminate\Support\Facades\DB;

class DatabaseHealthChecker
{
    private ?int $latencyMs = null;

    public function check(): bool
    {
        try {
            $start = microtime(true);
            DB::select('select 1');
            $this->latencyMs = (int) ((microtime(true) - $start) * 1000);

            return true;
        } catch (\Throwable $e) {
            $this->latencyMs = null;

            return false;
        }
    }

    public function getLatencyMs(): ?int
    {
        return $this->latencyMs;
    }
}
