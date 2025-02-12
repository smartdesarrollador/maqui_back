<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaCategory extends Model
{
    use SoftDeletes;

    protected $table = 'media_categories';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_active',
        'sort_order',
        'parent_id'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function files(): HasMany
    {
        return $this->hasMany(MediaFile::class, 'category_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(MediaCategory::class, 'parent_id');
    }
} 