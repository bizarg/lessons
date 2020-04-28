<?php

declare(strict_types=1);

namespace Api\Application\Project\DeleteProject;

use Api\Domain\Project\ProjectRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class DeleteProjectHandler
 * @package Api\Application\Project
 */
class DeleteProjectHandler implements Handler
{
    /** @var ProjectRepository */
    private ProjectRepository $projectRepository;

    /**
     * DeleteProjectHandler constructor.
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
     * @param Command|DeleteProject $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $this->projectRepository->delete($command->project());
    }
}
