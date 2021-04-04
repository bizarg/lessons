<?php

declare(strict_types=1);

namespace App\Application\Permission\DeletePermission;

use App\Domain\Permission\Permission;
use ItDevgroup\CommandBus\Command;

/**
 * Class DeletePermission
 * @package App\Application\Permission
 */
class DeletePermission implements Command
{
    /**
     * @var Permission
     */
    private Permission $permission;

    /**
     * DeletePermission constructor.
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * @return Permission
     */
    public function permission(): Permission
    {
        return $this->permission;
    }
}
