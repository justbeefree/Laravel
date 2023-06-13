<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MainControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSuccessMainIndex(): void
    {
        $response = $this->get('/');
        $response->assertViewIs("main");
        $response->assertStatus(200);
    }
}
