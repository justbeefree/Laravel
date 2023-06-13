<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonalControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSuccessPersonalIndex(): void
    {
        $response = $this->get(route('personal'));
        $response->assertViewIs("personal.index");
        $response->assertStatus(200);
    }

    public function testSuccessPersonalAuth(): void
    {
        $postData = [
            'login' => fake()->jobTitle(),
            'password' => fake()->password(10),
            'remember' => fake()->boolean(),
        ];

        $response = $this->post(route('personal.auth', $postData));
        $response->assertJsonMissingValidationErrors(['login','password','remember']);
        $response->assertJsonMissing(['address']);
        $response->assertStatus(200);
    }

}
