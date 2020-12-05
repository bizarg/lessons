<?php

declare(strict_types=1);

namespace App\Application\Language\UpdateLanguage;

use App\Domain\Language\Language;
use App\Domain\Language\LanguageRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdateLanguageHandler
 * @package App\Application\Language\UpdateLanguage
 */
class UpdateLanguageHandler implements Handler
{
    /**
     * @var LanguageRepository
     */
    private LanguageRepository $languageRepository;

    /**
     * UpdateLanguageHandler constructor.
     * @param LanguageRepository $languageRepository
     */
    public function __construct(
        LanguageRepository $languageRepository
    ) {
        $this->languageRepository = $languageRepository;
    }

    /**
     * @param Command|UpdateLanguage $command
     * @return Language
     */
    public function handle(Command $command)
    {
        $language = $command->language();

        $this->languageRepository->store($language);

        return $language;
    }
}
