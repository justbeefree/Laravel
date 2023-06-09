<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('active', true);
    }

}
