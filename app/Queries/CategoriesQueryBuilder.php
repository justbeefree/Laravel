<?php

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoriesQueryBuilder
{
    public function getModel(): Builder
    {
        return Category::query();
    }

    public function getCategories(): Collection
    {
        return $this->getModel()->select(
            'id',
            'name',
            'description',
            'active',
            'code',
            'source_id'
        )->active()->get();

    }

    public function getAllCategories()
    {
        return $this->getModel()->select(
            'id',
            'name',
            'description',
            'active',
            'code',
            'source_id'
        )->paginate(10);

    }

    public function getAllCategoriesArray()
    {
        $arCategory = [];
        foreach ($this->getModel()->select(
            'id',
            'name',
            'description',
            'active',
            'code',
            'source_id'
        )->get() as $category){
            $arCategory[$category->id] = $category;
        }

        return $arCategory;

    }

    public function getCategoryByCode(string $code)
    {
        return $this->getModel()->where('code', '=', $code)->first();
    }

}
