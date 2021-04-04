<?php

declare(strict_types=1);

namespace App\Application\Permission\UpdatePermission;

use App\Domain\Permission\Permission;
use App\Domain\Permission\PermissionRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdatePermissionHandler
 * @package App\Application\Permission\UpdatePermission
 */
class UpdatePermissionHandler implements Handler
{
    /**
     * @var PermissionRepository
     */
    private PermissionRepository $permissionRepository;

    /**
     * UpdatePermissionHandler constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(
        PermissionRepository $permissionRepository
    ) {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param Command|UpdatePermission $command
     * @return Permission
     */
    public function handle(Command $command): Permission
    {
        $permission = $command->permission();
        $permission->name = $command->name();
        $permission->guard_name = $command->guardName();

        $this->permissionRepository->store($permission);

        return $permission;
    }
}
