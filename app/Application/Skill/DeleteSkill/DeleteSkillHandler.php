<?php

declare(strict_types=1);

namespace App\Application\Skill\DeleteSkill;

use App\Domain\Skill\SkillRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class DeleteSkillHandler
 * @package App\Application\Skill
 */
class DeleteSkillHandler implements Handler
{
    /**
     * @var SkillRepository
     */
    private SkillRepository $skillRepository;

    /**
     * DeleteSkillHandler constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(
        SkillRepository $skillRepository
    ) {
        $this->skillRepository = $skillRepository;
    }

    /**
     * @param Command|DeleteSkill $command
     * @return void
     */
    public function handle(Command $command): void
    {
        $this->skillRepository->delete($command->skill());
    }
}
