<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Category;
use App\Models\News;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function category(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
