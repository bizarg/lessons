<?php

declare(strict_types=1);

namespace Api\Application\Project\UpdateProject;

use Api\Domain\Project\Project;
use App\Domain\Project\ProjectRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class UpdateProjectHandler
 * @package Api\Application\Project\UpdateProject
 */
class UpdateProjectHandler implements Handler
{
    /**
     * @var ProjectRepository
     */
    private ProjectRepository $projectRepository;

    /**
     * UpdateProjectHandler constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(
        ProjectRepository $projectRepository
    ) {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @param Command|UpdateProject $command
     * @return Project
     */
    public function handle(Command $command)
    {
        $project = $command->project();

        $this->projectRepository->store($project);

        return $project;
    }
}
