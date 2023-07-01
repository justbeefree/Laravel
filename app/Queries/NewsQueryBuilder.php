<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

class NewsQueryBuilder
{
    public function  getModel(): Builder
    {
        return News::query();
    }


    public function getNewsByCategoryCode(int $id)
    {
        return $this->getModel()->select(
            'id',
            'published_at',
            'name',
            'preview_text',
            'detail_text',
            'images',
            'active',
            'category_id',
            'source_id'
        )->where('category_id', '=', $id)->active()->get();
    }

    public function getAllNews()
    {
        return $this->getModel()->select(
            'id',
            'published_at',
            'name',
            'preview_text',
            'detail_text',
            'images',
            'active',
            'category_id',
            'source_id'
        )->paginate(10);

    }

    public function getNewsByCategoryCodeAndNewsId(int $category_id, int $id): mixed
    {
        return $this->getModel()->where('category_id', '=', $category_id)->where('id', '=', $id)->active()->first();
    }
}
