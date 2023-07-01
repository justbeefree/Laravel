<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\FeedbacksQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\OrdersQueryBuilder;
use App\Queries\SourcesQueryBuilder;
use Illuminate\Support\ServiceProvider;
use App\Queries\QueryBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, SourcesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, OrdersQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, FeedbacksQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
