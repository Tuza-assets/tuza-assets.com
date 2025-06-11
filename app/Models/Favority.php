<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favority extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'email'];

    // Define the relationship to the Product model
    public function product()
    {
        return $this->belongsTo(PropertyOnSell::class, 'product_id');
    }
}
