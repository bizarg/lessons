<?php

namespace App\Providers;

use App\Domain\Article\Article;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Lcobucci\JWT\Decoder;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Parser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        if ($this->app->environment() !== 'production') {
//            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
//        }
        $this->app->singleton(Parser::class, \Lcobucci\JWT\Token\Parser::class);
        $this->app->singleton(Decoder::class, JoseEncoder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::routes();
        Passport::withoutCookieSerialization();
        Blade::withoutDoubleEncoding();

        Route::bind('article', function ($id) {
            return Article::findOrFail($id);
        });
    }
}
