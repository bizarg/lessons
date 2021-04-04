<?php

declare(strict_types=1);

namespace App\Application\Role\UpdateRole;

use App\Domain\Role\Role;
use App\Domain\Role\RoleRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdateRoleHandler
 * @package App\Application\Role\UpdateRole
 */
class UpdateRoleHandler implements Handler
{
    /**
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * UpdateRoleHandler constructor.
     * @param RoleRepository $roleRepository
     */
    public function __construct(
        RoleRepository $roleRepository
    ) {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param Command|UpdateRole $command
     * @return Role
     */
    public function handle(Command $command): Role
    {
        $role = $command->role();
        $role->name = $command->name();
        $role->guard_name = $command->guardName();
        $role->syncPermissions($command->permissions());
        $this->roleRepository->store($role);

        return $role;
    }
}
