<?php

namespace App\Http\Middleware;

use App\Domain\Language\LanguageFilter;
use App\Domain\Language\LanguageRepository;
use Closure;
use Illuminate\Foundation\Application;

class ApiLocale
{
    /**
     * @var Application
     */
    private $app;
    /**
     * @var LanguageRepository
     */
    private $languageRepository;

    /**
     * ApiLocale constructor.
     * @param Application $app
     * @param LanguageRepository $languageRepository
     */
    public function __construct(
        Application $app,
        LanguageRepository $languageRepository
    ) {
        $this->app = $app;
        $this->languageRepository = $languageRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $defaultLocaleCode = 'en';
        $localeCodes = $this->languageRepository->collection()
            ->pluck('code')
            ->toArray();
        $localeCode = $request->hasHeader('X-localization') ? $request->header('X-localization') : $defaultLocaleCode;
        $localeCode = in_array($localeCode, $localeCodes) ? $localeCode : $defaultLocaleCode;
        $this->app->setLocale($localeCode);

        return $next($request);
    }
}
