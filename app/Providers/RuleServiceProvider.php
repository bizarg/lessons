<?php

namespace App\Providers;

use App\Rules\Translate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

/**
 * Class RuleServiceProvider
 * @package App\Providers
 */
class RuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('translate', Translate::class, Translate::message());
    }
}
