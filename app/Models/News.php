<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $availableFields = ['id', 'title', 'author', 'status', 'short_description', 'created_at'];

    public function getNews(): array
    {
        return DB::table($this->table)
            ->select($this->availableFields)
            ->get()
            ->toArray();
    }

    public function getNewsCategory(int $category_id): array
    {
        return DB::table($this->table)
            ->join('categories_has_news as chn', 'chn.news_id', '=', "{$this->table}.id")
            ->where('chn.category_id', '=', $category_id)
            ->select("{$this->table}.*")
            ->get()
            ->toArray();
    }

    public function getNewsById(int $id): \stdClass
    {
        return DB::table($this->table)
            ->join('categories_has_news as chn', 'chn.news_id', '=', "{$this->table}.id")
            ->join('categories', 'chn.category_id', '=', 'categories.id')
            ->where("{$this->table}.id", '=', $id)
            ->select("{$this->table}.*", "categories.title as categoryTitle")
            ->get()
            ->toArray()[0];
    }
}
