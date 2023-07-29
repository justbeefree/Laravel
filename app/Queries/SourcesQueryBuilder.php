<?php

namespace App\Queries;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;

class SourcesQueryBuilder
{
    public function  getModel(): Builder
    {
        return Source::query();
    }


    public function getSources()
    {
        $arSources = [];
        foreach ($this->getModel()->get() as $sources){
            $arSources[$sources->id] = $sources;
        }

        return $arSources;
    }

    public function getAllSources()
    {
        return $this->getModel()->paginate(10);
    }

    public function getSourceById(int $id): mixed
    {
        return $this->getModel()->where('id', '=', $id)->first();
    }

    public function getSourceByName(string $name): mixed
    {
        return $this->getModel()->where('name', '=', $name)->first();
    }
}
