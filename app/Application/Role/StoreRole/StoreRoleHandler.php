<?php

declare(strict_types=1);

namespace App\Application\Role\StoreRole;

use App\Domain\Role\Role;
use App\Domain\Role\RoleRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class StoreRoleHandler
 * @package App\Application\Role
 */
class StoreRoleHandler implements Handler
{
    /**
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * StoreRoleHandler constructor.
     * @param RoleRepository $roleRepository
     */
    public function __construct(
        RoleRepository $roleRepository
    ) {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param Command|StoreRole $command
     * @return Role
     */
    public function handle(Command $command): Role
    {
        $role = Role::register(
            $command->name(),
            $command->guardName()
        );

        $role->givePermissionTo($command->permissions());

        $this->roleRepository->store($role);

        return $role;
    }
}
