<?php

declare(strict_types=1);

namespace Api\Application\Project\GetProjectList;

use Api\Domain\Project\ProjectRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class GetProjectListHandler
 * @package Api\Application\LeadStatus\GetLeadStatusList
 */
class GetProjectListHandler implements Handler
{
    /**
     * @var ProjectRepository
     */
    private ProjectRepository $customerRepository;

    /**
     * GetLeadStatusListHandler constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(
        ProjectRepository $projectRepository
    ) {
        $this->projectRepository = $projectRepository;
    }
    /**
     * Handle a Command object
     *
     * @param Command|GetProjectList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
		return $this->projectRepository->setFilter($command->filter())->setOrder($command->order())
			->paginate($command->pagination());
    }
}
