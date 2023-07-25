<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\FeedbacksQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\OrdersQueryBuilder;
use App\Queries\SourcesQueryBuilder;
use App\Queries\UsersQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\ParserService;
use App\Services\SocialService;
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
        $this->app->bind(QueryBuilder::class, UsersQueryBuilder::class);

        //services

        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
