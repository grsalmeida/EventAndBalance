<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResetTest extends TestCase
{
    /**
     * test status.
     *
     * @return void
     */
    public function test_reset()
    {
        $response = $this->post('reset');

        $response->assertStatus(200);
    }
}
