<?php

declare(strict_types=1);

namespace Api\Application\Project\RegisterProject;

use Api\Domain\Project\Project;
use Api\Domain\Project\ProjectRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class RegisterProjectHandler
 * @package App\Application\Project
 */
class RegisterProjectHandler implements Handler
{
    /**
     * @var ProjectRepository
     */
    private ProjectRepository $projectRepository;

    /**
     * RegisterProjectHandler constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(
        ProjectRepository $projectRepository
    ) {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @param Command|RegisterProject $command
     * @return Project
     */
    public function handle(Command $command)
    {
        $project = new Project();

        $this->projectRepository->store($project);

        return $project;
    }
}
