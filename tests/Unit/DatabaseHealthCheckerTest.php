<?php

namespace Tests\Unit;

use App\Services\Health\DatabaseHealthChecker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseHealthCheckerTest extends TestCase
{
    public function test_it_reports_db_up(): void
    {
        DB::shouldReceive('select')
            ->once()
            ->with('select 1')
            ->andReturn([['ok' => 1]]);

        $checker = new DatabaseHealthChecker;

        $this->assertTrue($checker->check());
        $this->assertNotNull($checker->getLatencyMs());
    }

    public function test_it_reports_db_down(): void
    {
        DB::shouldReceive('select')
            ->once()
            ->with('select 1')
            ->andThrow(new \RuntimeException('db down'));

        $checker = new DatabaseHealthChecker;

        $this->assertFalse($checker->check());
        $this->assertNull($checker->getLatencyMs());
    }
}
