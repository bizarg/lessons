<?php

declare(strict_types=1);

namespace App\Application\Permission\StorePermission;

use App\Domain\Permission\Permission;
use App\Domain\Permission\PermissionRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class StorePermissionHandler
 * @package App\Application\Permission
 */
class StorePermissionHandler implements Handler
{
    /**
     * @var PermissionRepository
     */
    private PermissionRepository $permissionRepository;

    /**
     * StorePermissionHandler constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(
        PermissionRepository $permissionRepository
    ) {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param Command|StorePermission $command
     * @return Permission
     */
    public function handle(Command $command): Permission
    {
        $permission = Permission::register($command->name(), $command->guardName());

        $this->permissionRepository->store($permission);

        return $permission;
    }
}
