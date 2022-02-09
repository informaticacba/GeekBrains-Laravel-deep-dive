<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->userName(),
                'comment' => $faker->text(1000),
                'created_at' => now('Europe/Moscow'),
                'updated_at' => now('Europe/Moscow')
            ];
        }

        return $data;
    }
}
