<?php

declare(strict_types=1);

namespace Api\Domain\Project;

use App\Domain\Core\EntityNotFound;

/**
 * Class ProjectNotFound
 * @package Api\Domain\Project
 */
class ProjectNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Project with id #{$id} not found.");
    }
}
