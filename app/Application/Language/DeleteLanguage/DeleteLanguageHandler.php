<?php

declare(strict_types=1);

namespace App\Application\Language\DeleteLanguage;

use App\Domain\Language\LanguageRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class DeleteLanguageHandler
 * @package App\Application\Language
 */
class DeleteLanguageHandler implements Handler
{
    /** @var LanguageRepository */
    private LanguageRepository $languageRepository;

    /**
     * DeleteLanguageHandler constructor.
     * @param LanguageRepository $languageRepository
     */
    public function __construct(
        LanguageRepository $languageRepository
    ) {
        $this->languageRepository = $languageRepository;
    }
    /**
     * Handle a Command object
     *
     * @param Command|DeleteLanguage $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $this->languageRepository->delete($command->language());
    }
}
