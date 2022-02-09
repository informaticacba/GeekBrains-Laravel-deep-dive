<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $title = $faker->sentence(5);
            $data[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'author' => $faker->userName(),
                'short_description' => $faker->text(100),
                'description' => $faker->text(1000),
                'source_id' => mt_rand(1, 10),
                'created_at' => now('Europe/Moscow'),
                'updated_at' => now('Europe/Moscow')
            ];
        }

        return $data;
    }
}
