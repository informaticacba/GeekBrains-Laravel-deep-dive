<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public static array $availableFields = ['id', 'title', 'author', 'status', 'short_description', 'created_at', 'updated_at'];

    protected $fillable = [
        'title',
        'slug',
        'author',
        'source_id',
        'status',
        'short_description',
        'description'
    ];

    protected $casts = [
        'isImage' => 'boolean'
    ];

    public function getTitleAttribute(string $value): string
    {
        return mb_strtoupper($value);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_has_news', 'news_id', 'category_id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(DataSource::class, 'source_id');
    }
}
