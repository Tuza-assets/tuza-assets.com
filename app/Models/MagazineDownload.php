<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagazineDownload extends Model
{
    use HasFactory;
    protected $fillable = ['magazine_id', 'name', 'email', 'subscribed'];

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
}
