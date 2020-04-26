<?php

namespace App\Providers;

use App\Domain\Article\ArticleRepository;
use App\Infrastructure\Eloquent\EloquentArticleRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class DomainServiceProvider
 * @package App\Providers
 */
class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ArticleRepository::class, EloquentArticleRepository::class);
//        $this->app->singleton(ArticleRepository::class, EloquentArticleRepository::class);
    }
}
