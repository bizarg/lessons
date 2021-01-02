<?php

declare(strict_types=1);

namespace App\Application\Skill\UpdateSkill;

use App\Domain\Skill\Skill;
use App\Domain\Skill\SkillRepository;
use Exception;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdateSkillHandler
 * @package App\Application\Skill\UpdateSkill
 */
class UpdateSkillHandler implements Handler
{
    /**
     * @var SkillRepository
     */
    private SkillRepository $skillRepository;

    /**
     * UpdateSkillHandler constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(
        SkillRepository $skillRepository
    ) {
        $this->skillRepository = $skillRepository;
    }

    /**
     * @param Command|UpdateSkill $command
     * @return Skill
     * @throws Exception
     */
    public function handle(Command $command): Skill
    {
        $skill = $command->skill();
        $skill->title = $command->title();
        $skill->description = $command->description();

        $this->skillRepository->store($skill);

        return $skill;
    }
}
