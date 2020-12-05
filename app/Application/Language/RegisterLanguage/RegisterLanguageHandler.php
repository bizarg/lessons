<?php

declare(strict_types=1);

namespace App\Application\Language\RegisterLanguage;

use App\Domain\Language\Language;
use App\Domain\Language\LanguageRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class RegisterLanguageHandler
 * @package App\Application\Language
 */
class RegisterLanguageHandler implements Handler
{
    /**
     * @var LanguageRepository
     */
    private LanguageRepository $languageRepository;

    /**
     * RegisterLanguageHandler constructor.
     * @param LanguageRepository $languageRepository
     */
    public function __construct(
        LanguageRepository $languageRepository
    ) {
        $this->languageRepository = $languageRepository;
    }

    /**
     * @param Command|RegisterLanguage $command
     * @return Language
     */
    public function handle(Command $command)
    {
        $language = new Language();

        $this->languageRepository->store($language);

        return $language;
    }
}
