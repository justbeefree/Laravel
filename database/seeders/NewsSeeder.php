<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $response = [];
        for ($i=0; $i < 100; $i++) {
            $response[] = [
                'created_at' => fake()->dateTime(),
                'updated_at' => fake()->dateTime(),
                'published_at' => fake()->dateTime(),
                'name' => fake()->sentence(rand(3,10)),
                'preview_text' => fake()->realText(rand(100,200)),
                'detail_text' => fake()->realText(rand(300,400)),
                'images' => fake()->imageUrl(),
                'active' => fake()->boolean(100),
                'category_id' => rand(1021,1030),
                'source_id' => rand(1021,1040)
            ];
        }
        return $response;
    }
}
