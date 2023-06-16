<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSuccessOrderIndex(): void
    {
        $response = $this->get(route('order'));
        $response->assertViewIs("order.index");
        $response->assertStatus(200);
    }

    public function testSuccessOrderStore(): void
    {
        $postData = [
            'name' => fake()->jobTitle(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'textInfo' => fake()->text(249),
        ];

        $response = $this->post(route('order.store', $postData));


        $response->assertStatus(302);
    }


    public function testErrorOrderStore(): void
    {
        $postData = [
            'name' => fake()->jobTitle(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'textInfo' => fake()->text(251),
        ];

        $response = $this->post(route('order.store', $postData));


        $response->assertStatus(302);
    }
}
