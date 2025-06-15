<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
 protected $fillable = [
        'title',
        'summary',
        'contents',
        'category',
        'images', 
        'status',
        'category_id',    
        'Authname', 
       'slug',
    ];

    protected $casts = [ 
        'images' => 'array',
    ];
    // Define the relationship with BlogCategory
    public function categories()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');  // Category relation
    }
}
