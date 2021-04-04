<?php

declare(strict_types=1);

namespace App\Application\Permission\DeletePermission;

use App\Domain\Permission\PermissionRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class DeletePermissionHandler
 * @package App\Application\Permission
 */
class DeletePermissionHandler implements Handler
{
    /**
     * @var PermissionRepository
     */
    private PermissionRepository $permissionRepository;

    /**
     * DeletePermissionHandler constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(
        PermissionRepository $permissionRepository
    ) {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param Command|DeletePermission $command
     * @return void
     */
    public function handle(Command $command): void
    {
        $this->permissionRepository->delete($command->permission());
    }
}
