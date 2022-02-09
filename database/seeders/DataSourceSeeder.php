<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(10),
                'link' => '#',
                'created_at' => now('Europe/Moscow'),
                'updated_at' => now('Europe/Moscow')
            ];
        }

        return $data;
    }
}
