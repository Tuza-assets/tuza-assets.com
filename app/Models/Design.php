<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'package_includes', 
        'price',
        'main_image',
        'images',
        'status',
        'zone', 
        'size', 
        'dimensions', 
        'number_of_rooms', 
        'additional_information',
    ];
    protected $casts = [
        'images' => 'array',
    ];
}
