<?php

declare(strict_types=1);

namespace Api\Application\Project\DeleteProject;

use Api\Domain\Project\Project;
use Rosamarsky\CommandBus\Command;

/**
 * Class DeleteProject
 * @package Api\Application\Project
 */
class DeleteProject implements Command
{
    /** @var Project */
    private Project $project;

    /**
     * DeleteProject constructor.
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /** @return Project */
    public function project(): Project
    {
        return $this->project;
    }
}
