<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(?int $id_category = null):array
    {
        $faker = Factory::create();
        $data = [];

        for($i = 1; $i <= 10; $i++) {
            $data[] = [
                'id' => $i,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100),
                'author' => $faker->userName(),
                'created_at' => now('Europe/Moscow'),
                'id_category' => $faker->numberBetween(1, 5)
            ];
        }

        return ($id_category) ? array_filter($data, fn($item) => $item['id_category'] == $id_category) : $data;
    }

    public function getNewsOne(?int $id = null):array
    {
        $faker = Factory::create();

        return [
            'id' => $id,
            'title' => $faker->jobTitle(),
            'description' => $faker->text(100),
            'author' => $faker->userName(),
            'created_at' => now('Europe/Moscow')
        ];
    }

    public function getCategories(?int $id = null)
    {
        $data = [
            ['id' => 1, 'title' => "Спорт"],
            ['id' => 2, 'title' => "Погода"],
            ['id' => 3, 'title' => "Шоу-бизнес"],
            ['id' => 4, 'title' => "Политика"],
            ['id' => 5, 'title' => "Чрезвычайные"]
        ];

        if ($id !== null)
        {
            foreach ($data as $category)
            {
                if ($category['id'] == $id)
                    return $category;
            }
        }

        return $data;
    }
}
