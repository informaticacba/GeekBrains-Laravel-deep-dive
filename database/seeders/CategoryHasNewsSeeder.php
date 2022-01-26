<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryHasNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_has_news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $used = [];

        for ($k = 1; $k <= 5; $k ++) {
            for ($i = 0; $i < 10; $i++) {
                $newsId = mt_rand(1, 50);
                while (in_array($newsId, $used)) {
                    $newsId = mt_rand(1, 50);
                }

                $used[] = $newsId;

                $data[] = [
                    'news_id' => $newsId,
                    'category_id' => $k
                ];
            }
        }

        return $data;
    }
}
