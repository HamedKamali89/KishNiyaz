<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'national_id',
        'address',
        'birth_date',
        'emergency_contact',
        'website',
        'social_media',
        'skills',
        'experience_years',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'social_media' => 'array',
        'experience_years' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
