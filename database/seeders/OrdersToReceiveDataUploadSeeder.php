<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersToReceiveDataUploadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_to_receive_data_upload')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create('ru_RU');

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->userName(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'info' => $faker->text(1000),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ];
        }

        return $data;
    }
}
