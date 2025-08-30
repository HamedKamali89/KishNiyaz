<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_type',
        'title',
        'file_path',
        'is_verified',
        'expiry_date',
        'verified_at',
        'verified_by',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'expiry_date' => 'date',
        'verified_at' => 'datetime',
    ];

    const TYPE_LICENSE = 'license';
    const TYPE_CERTIFICATE = 'certificate';
    const TYPE_INSURANCE = 'insurance';
    const TYPE_OTHER = 'other';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function isExpired()
    {
        return $this->expiry_date && $this->expiry_date->isPast();
    }
}
