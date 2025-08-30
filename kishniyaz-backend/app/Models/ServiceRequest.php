<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'service_id',
        'title',
        'description',
        'budget',
        'deadline',
        'location',
        'status',
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'budget' => 'decimal:2',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function service()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}
