<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_see_home_page()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
