<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('sources')->insert($this->getData());
    }

    public function getData()
    {
        $response = [];
        for ($i=0; $i < 20; $i++) {
            $response[] = [
                'created_at' => fake()->dateTime(),
                'updated_at' => fake()->dateTime(),
                'name' => fake()->jobTitle(),
                'link' => fake()->url()
            ];
        }
        return $response;
    }
}
