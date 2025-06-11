<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyOnSell;

class Zonning extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
        'description',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];
    
    public function properties()
    {
        return $this->hasMany(PropertyOnSell::class, 'zoning_id');
    }
}
