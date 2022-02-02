<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderToReceiveDataUpload extends Model
{
    use HasFactory;

    protected $table = 'orders_to_receive_data_upload';

    public static array $availableFields = ['id', 'name', 'phone', 'email', 'info', 'created_at'];

    protected $fillable = [
        'name',
        'phone',
        'email',
        'info'
    ];
}
