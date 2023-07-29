<?php

namespace App\Queries;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Builder;

class ResourcesQueryBuilder
{
    public function  getModel(): Builder
    {
        return Resource::query();
    }


    public function getResources()
    {
        return $this->getModel()->paginate(10);
    }

    public function getResourcesById(int $id): mixed
    {
        return $this->getModel()->where('id', '=', $id)->first();
    }
}
