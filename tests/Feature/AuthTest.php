<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic login test.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->post('/api/login', ['email' => 'foo@bar.com', 'password' => 'bar']);

        $response->assertStatus(401);
    }
}
