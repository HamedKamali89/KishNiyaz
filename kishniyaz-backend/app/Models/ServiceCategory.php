<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'parent_id',
        'is_active',
        'order',
        'meta_data',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'meta_data' => 'array',
    ];

    public function parent()
    {
        return $this->belongsTo(ServiceCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ServiceCategory::class, 'parent_id');
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'category_id');
    }

    public function providers()
    {
        return $this->belongsToMany(User::class, 'provider_categories', 'category_id', 'provider_id');
    }
}
