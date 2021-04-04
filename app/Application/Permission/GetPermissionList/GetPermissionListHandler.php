<?php

declare(strict_types=1);

namespace App\Application\Permission\GetPermissionList;

use App\Domain\Permission\PermissionRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetPermissionListHandler
 * @package App\Application\Permission\GetPermissionList
 */
class GetPermissionListHandler implements Handler
{
    /**
     * @var PermissionRepository
     */
    private PermissionRepository $permissionRepository;

    /**
     * GetPermissionListHandler constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(
        PermissionRepository $permissionRepository
    ) {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetPermissionList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->permissionRepository
        	->setFilter($command->filter())
        	->setOrder($command->order())
        	->pagination($command->pagination());
    }
}
