<?php

declare(strict_types=1);

namespace App\Application\Skill\DeleteSkill;

use App\Domain\Skill\Skill;
use ItDevgroup\CommandBus\Command;

/**
 * Class DeleteSkill
 * @package App\Application\Skill
 */
class DeleteSkill implements Command
{
    /**
     * @var Skill
     */
    private Skill $skill;

    /**
     * DeleteSkill constructor.
     * @param Skill $skill
     */
    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
    }

    /**
     * @return Skill
     */
    public function skill(): Skill
    {
        return $this->skill;
    }
}
