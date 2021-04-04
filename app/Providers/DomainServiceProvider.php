<?php

namespace App\Providers;

use App\Domain\Article\ArticleRepository;
use App\Domain\Category\CategoryRepository;
use App\Domain\Language\LanguageRepository;
use App\Domain\Notification\NotificationRepository;
use App\Domain\Permission\PermissionRepository;
use App\Domain\Role\RoleRepository;
use App\Domain\Skill\SkillRepository;
use App\Domain\Tag\TagRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Eloquent\EloquentArticleRepository;
use App\Infrastructure\Eloquent\EloquentCategoryRepository;
use App\Infrastructure\Eloquent\EloquentLanguageRepository;
use App\Infrastructure\Eloquent\EloquentNotificationRepository;
use App\Infrastructure\Eloquent\EloquentPermissionRepository;
use App\Infrastructure\Eloquent\EloquentRoleRepository;
use App\Infrastructure\Eloquent\EloquentSkillRepository;
use App\Infrastructure\Eloquent\EloquentTagRepository;
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
        $this->app->singleton(TagRepository::class, EloquentTagRepository::class);
        $this->app->singleton(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->singleton(SkillRepository::class, EloquentSkillRepository::class);
        $this->app->singleton(RoleRepository::class, EloquentRoleRepository::class);
        $this->app->singleton(PermissionRepository::class, EloquentPermissionRepository::class);
    }
}
