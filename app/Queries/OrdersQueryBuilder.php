<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrdersQueryBuilder
{
    public function getModel(): Builder
    {
        return Order::query();
    }


    public function getOrders()
    {
        return $this->getModel()->paginate(10);
    }
}
