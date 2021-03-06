<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $titles = [
            'Спорт',
            'Погода',
            'Политика',
            'IT',
            'Шоу-бизнес',
        ];
        $data = [];
        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'title' => $titles[$i],
                'description' => $faker->text(100),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ];
        }

        return $data;
    }
}
