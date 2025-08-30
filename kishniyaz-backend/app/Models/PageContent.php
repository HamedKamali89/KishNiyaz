<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PageContent extends Model
{
    protected $fillable = [
        'page_name',
        'section_name',
        'content_type',
        'content',
        'meta_data',
        'is_active',
    ];

    protected $casts = [
        'content' => 'array',
        'meta_data' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::saved(function ($content) {
            Cache::forget("content_{$content->page_name}_{$content->section_name}");
        });

        static::deleted(function ($content) {
            Cache::forget("content_{$content->page_name}_{$content->section_name}");
        });
    }
}
