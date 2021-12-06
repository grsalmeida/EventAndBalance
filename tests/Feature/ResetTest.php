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
        $response = $this->post('v1/reset');

        $response->assertStatus(200);
    }

    /**
     * test status.
     *
     * @return void
     */
    public function test_reset_response()
    {
        $response = $this->post('v1/reset');

        $response->assertJson(['ok']);
    }
}
