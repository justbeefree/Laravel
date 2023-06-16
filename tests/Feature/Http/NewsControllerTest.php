<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSuccessNewsList(): void
    {
        $response = $this->get(route('news'));

        $response->assertViewHasAll([
            'category',
        ]);
        $response->assertStatus(200);
    }

    public function testSuccessNewsCategory(): void
    {
        $response = $this->get(route('news.list', ['category_code' => 'category_1']));

        $response->assertViewIs("news.list");
        $response->assertViewHasAll([
            'category',
            'news'
        ]);
        $response->assertStatus(200);
    }


    public function testSuccessNewsCreate(): void
    {
        $response = $this->get(route('news.create'));

        $response->assertViewIs("news.create");
        $response->assertStatus(200);
    }

    public function testSuccessNewsShow(): void
    {
        $category_code = "category_1";
        $id = "1";
        $response = $this->get(route('news.show', [$category_code, $id]));

        $response->assertViewIs("news.detail");
        $response->assertViewHasAll(['news']);
        $response->assertViewMissing("user");
        $this->assertGuest($guard = null);
        $response->assertStatus(200);
    }

    public function testSuccessCreateForm()
    {
        $response = $this->get(route('news.create'));

        $response->assertStatus(200);
    }

    public function testSuccessStoreResponse()
    {
        $postData = [
            'name' => fake()->jobTitle(),
            'previewText' => fake()->text(100),
            'detailText' => fake()->text(100),
            'status' => 'DRAFT',
        ];

        $response = $this->post(route('news.store', $postData));
        $response->assertStatus(302);
    }

    public function testErrorStoreResponse()
    {
        $postData = [
//            'name' => fake()->jobTitle(),
            'previewText' => fake()->text(100),
            'detailText' => fake()->text(100),
            'status' => 'DRAFT',
        ];

        $response = $this->post(route('news.store', $postData));

        $response->assertStatus(302);
    }
}
