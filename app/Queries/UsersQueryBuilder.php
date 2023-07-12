<?php

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UsersQueryBuilder
{
    public function  getModel(): Builder
    {
        return User::query();
    }


    public function getUsers()
    {
        return $this->getModel()->paginate(10);
    }
//
//    public function getAllSources()
//    {
//        return $this->getModel()->paginate(10);
//    }
//
//    public function getSourceById(int $id): mixed
//    {
//        return $this->getModel()->where('id', '=', $id)->first();
//    }
}
