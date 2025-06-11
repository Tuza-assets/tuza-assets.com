<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'user_role',
        'email',
        'password',
        'SecretPassword',
        'phone',
        'country',
        'province',
        'district',
        'sector',
        'cell',
        'village',
        'status',
        'session_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's full address.
     */
    public function getFullAddressAttribute(): string
    {
        $addressParts = array_filter([
            $this->village,
            $this->cell,
            $this->sector,
            $this->district,
            $this->province,
            $this->country
        ]);

        return implode(', ', $addressParts);
    }

    /**
     * Scope to filter users by location.
     */
    public function scopeByLocation($query, $province = null, $district = null, $sector = null, $cell = null, $village = null)
    {
        return $query->when($province, fn($q) => $q->where('province', $province))
                    ->when($district, fn($q) => $q->where('district', $district))
                    ->when($sector, fn($q) => $q->where('sector', $sector))
                    ->when($cell, fn($q) => $q->where('cell', $cell))
                    ->when($village, fn($q) => $q->where('village', $village));
    }
}