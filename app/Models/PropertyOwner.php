<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'upi',
        'owner_name',
        'owner_phone',
        'owner_other_phone',
    ];
    public function property()
    {
        return $this->belongsTo(PropertyOnSell::class,'property_id');
    }
}
