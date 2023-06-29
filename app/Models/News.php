<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNewsByCategoryCode(int $id)
    {
        return \DB::table($this->table)->select(
            'id',
            'published_at',
            'name',
            'preview_text',
            'detail_text',
            'images',
            'active',
            'category_id',
            'source_id'
        )->where('category_id', '=', $id)->get();
    }

    public function getNewsByCategoryCodeAndNewsId(int $category_id, int $id): mixed
    {
        return \DB::table($this->table)->where('category_id', '=', $category_id)->where('id', '=', $id)->first();
    }


}
