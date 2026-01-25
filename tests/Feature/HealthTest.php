<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthTest extends TestCase
{
    public function test_health_endpoint_returns_ok_when_db_is_up(): void
    {
        $res = $this->getJson('/api/health');

        $res->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'db' => 'ok',
            ]);
    }
}
