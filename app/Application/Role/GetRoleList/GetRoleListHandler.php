<?php

declare(strict_types=1);

namespace App\Application\Role\GetRoleList;

use App\Domain\Role\RoleRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetRoleListHandler
 * @package App\Application\Role\GetRoleList
 */
class GetRoleListHandler implements Handler
{
    /**
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * GetRoleListHandler constructor.
     * @param RoleRepository $roleRepository
     */
    public function __construct(
        RoleRepository $roleRepository
    ) {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetRoleList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->roleRepository
        	->setFilter($command->filter())
        	->setOrder($command->order())
        	->pagination($command->pagination());
    }
}
