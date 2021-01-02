<?php

declare(strict_types=1);

namespace App\Domain\Skill;

use App\Domain\Core\EntityNotFound;

/**
 * Class SkillNotFound
 * @package App\Domain\Skill
 */
class SkillNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Skill with id #{$id} not found.");
    }
}
