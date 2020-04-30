<?php

declare(strict_types=1);

namespace App\Application\Language\GetLanguageList;

use App\Domain\Language\LanguageRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class GetLanguageListHandler
 * @package App\Application\LeadStatus\GetLeadStatusList
 */
class GetLanguageListHandler implements Handler
{
    /**
     * @var LanguageRepository
     */
    private LanguageRepository $customerRepository;

    /**
     * GetLeadStatusListHandler constructor.
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
     * @param Command|GetLanguageList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
		return $this->languageRepository->setFilter($command->filter())->setOrder($command->order())
			->paginate($command->pagination());
    }
}
