<?php

namespace App\Providers;

use App\Domain\Article\ArticleRepository;
use App\Domain\Language\LanguageRepository;
use App\Domain\Notification\NotificationRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Eloquent\EloquentArticleRepository;
use App\Infrastructure\Eloquent\EloquentLanguageRepository;
use App\Infrastructure\Eloquent\EloquentNotificationRepository;
use App\Infrastructure\Eloquent\EloquentUserRepository;
use Carbon\Carbon;
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
        Carbon::serializeUsing(function ($carbon) {
            return $carbon->format('Y-m-d H:i:s');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ArticleRepository::class, EloquentArticleRepository::class);
        $this->app->singleton(UserRepository::class, EloquentUserRepository::class);
        $this->app->singleton(LanguageRepository::class, EloquentLanguageRepository::class);
        $this->app->singleton(NotificationRepository::class, EloquentNotificationRepository::class);
    }
}
