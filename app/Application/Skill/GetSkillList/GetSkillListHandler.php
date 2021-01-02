<?php

declare(strict_types=1);

namespace App\Application\Skill\GetSkillList;

use App\Domain\Skill\SkillRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetSkillListHandler
 * @package App\Application\Skill\GetSkillList
 */
class GetSkillListHandler implements Handler
{
    /**
     * @var SkillRepository
     */
    private SkillRepository $skillRepository;

    /**
     * GetSkillListHandler constructor.
     * @param SkillRepository $skillRepository
     */
    public function __construct(
        SkillRepository $skillRepository
    ) {
        $this->skillRepository = $skillRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetSkillList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->skillRepository
        	->setFilter($command->filter())
        	->setOrder($command->order())
        	->pagination($command->pagination());
    }
}
