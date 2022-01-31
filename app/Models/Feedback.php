<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    public static array $availableFields = ['id', 'name', 'comment', 'created_at'];

    protected $fillable = [
        'name',
        'comment'
    ];
}
