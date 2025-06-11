<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Zonning;

class PropertyOnSell extends Model
{
    use HasFactory;

    protected $table = 'property_on_sells';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'type',
        'country',
        'province',
        'district',
        'sector',
        'cell',
        'village',
        'house',
        'map_link',
        'images',
        'size',
        'floor',
        'room',
        'dimension',
        'status',
        'price',
        'property_type',
        'house_type',
        'availability',
        'zoning_id',
        'currency',
        'amenities',
        'garage_type',
        'rooms',
        'bedrooms',
        'kitchen',
        'dining_room',
        'storage',
        'construction_type',
        'bathroom',
        'year_of_construction',
        'upi',
        'mainimage',
        'property_code'
    ];

    protected $casts = [
        'images' => 'array',
        'floor' => 'integer',
        'amenities' => 'array',
    ];

    public function zoning()
    {
        return $this->belongsTo(Zonning::class, 'zoning_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


