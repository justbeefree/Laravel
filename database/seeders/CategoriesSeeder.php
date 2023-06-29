<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('categories')->insert($this->getData());
    }

    public function getData()
    {
        $response = [];
        for ($i=0; $i < 10; $i++) {
            $response[] = [
                'created_at' => fake()->dateTime(),
                'updated_at' => fake()->dateTime(),
                'name' => 'Категория №' . ($i + 1),
                'description' => fake()->realText(rand(100,200)),
                'active' => fake()->boolean(100),
                'code' => 'category_' . ($i + 1),
                'source_id' => rand(1021,1040)
            ];
        }
        return $response;
    }
}
