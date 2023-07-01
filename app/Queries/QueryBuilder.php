<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;

abstract class QueryBuilder
{
    abstract public function  getModel(): Builder;
}
