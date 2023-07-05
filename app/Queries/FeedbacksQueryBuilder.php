<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Collection;

class FeedbacksQueryBuilder
{
    public function getModel(): Builder
    {
        return Feedback::query();
    }


    public function getFeedbacks()
    {
        return $this->getModel()->paginate(10);
    }
}
