<?php

declare(strict_types=1);

namespace Api\Application\Project\UpdateProject;

use Api\Domain\Project\Project;
use Api\Http\Requests\Project\ProjectRequest;
use Illuminate\Http\Request;
use Rosamarsky\CommandBus\Command;

/**
 * Class UpdateProject
 * @package Api\Application\Project\UpdateProject
 */
class UpdateProject implements Command
{
    /** @var Project */
    private Project $project;

    /**
     * UpdateProject constructor.
     * @param Project $project
     */
    public function __construct(
        Project $project
    ) {
        $this->project = $project;
    }

    /**
     * @param Request|ProjectRequest $request
     * @param Project $project
     * @return self
     */
    public static function fromRequest(Request $request, Project $project): self
    {
        return (new self(
        	$project
        ));
    }

    /** @return Project */
    public function project(): Project
    {
        return $this->project;
    }
}
