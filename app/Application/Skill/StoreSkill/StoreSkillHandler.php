<?php

declare(strict_types=1);

namespace App\Application\Skill\StoreSkill;

use App\Domain\Skill\Skill;
use App\Domain\Skill\SkillRepository;
use Exception;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class StoreSkillHandler
 * @package App\Application\Skill
 */
class StoreSkillHandler implements Handler
{
    /**
     * @var SkillRepository
     */
    private SkillRepository $skillRepository;

    /**
     * StoreSkillHandler constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(
        SkillRepository $skillRepository
    ) {
        $this->skillRepository = $skillRepository;
    }

    /**
     * @param Command|StoreSkill $command
     * @return Skill
     * @throws Exception
     */
    public function handle(Command $command): Skill
    {
        $skill = Skill::register($command->title());
        $skill->description = $command->description();

        $this->skillRepository->store($skill);

        return $skill;
    }
}
