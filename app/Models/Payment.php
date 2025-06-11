<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_id',
        'amount',
        'currency',
        'payment_method',
        'payment_status',
        'customer_name',
        'customer_email',
        'customer_phone',
        'details',
        'callback_data',
        'user_id',
        'created_by',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'callback_data' => 'array',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
