<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $availableFields = ['id', 'title', 'description'];

    public function getCategories():array
    {
        return DB::table($this->table)
            ->select($this->availableFields)
            ->get()
            ->toArray();
    }

    public function getCategory(int $id): Builder
    {
        return DB::table($this->table)
            ->find($id, $this->availableFields);
    }
}
