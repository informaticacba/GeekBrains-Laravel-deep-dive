<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSource extends Model
{
    use HasFactory;

    protected $table = 'data_sources';
    public static $availableFields = ['id', 'title', 'link'];

    protected $fillable = [
        'title',
        'link'
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'source_id');
    }
}
