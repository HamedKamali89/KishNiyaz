<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const TYPE_CUSTOMER = 'customer';
    const TYPE_PROVIDER = 'provider';
    const TYPE_ADMIN = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'national_code',
        'user_type',
        'is_verified',
        'is_active',
        'avatar',
        'bio',
        'location',
        'rating',
        'balance',
        'settings',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified_at' => 'datetime',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
        'settings' => 'array',
        'rating' => 'decimal:2',
        'balance' => 'decimal:2',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->user_type === self::TYPE_ADMIN;
    }

    public function isProvider(): bool
    {
        return $this->user_type === self::TYPE_PROVIDER;
    }

    public function isCustomer(): bool
    {
        return $this->user_type === self::TYPE_CUSTOMER;
    }

    public function providerProfile()
    {
        return $this->hasOne(ProviderProfile::class);
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'customer_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'provider_id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function documents()
    {
        return $this->hasMany(ProviderDocument::class);
    }
}
