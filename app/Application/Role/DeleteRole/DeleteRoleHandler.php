<?php

declare(strict_types=1);

namespace App\Application\Role\DeleteRole;

use App\Domain\Role\RoleRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class DeleteRoleHandler
 * @package App\Application\Role
 */
class DeleteRoleHandler implements Handler
{
    /**
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * DeleteRoleHandler constructor.
     * @param RoleRepository $roleRepository
     */
    public function __construct(
        RoleRepository $roleRepository
    ) {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param Command|DeleteRole $command
     * @return void
     */
    public function handle(Command $command): void
    {
        $this->roleRepository->delete($command->role());
    }
}
