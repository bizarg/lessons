<?php

declare(strict_types=1);

namespace App\Application\Role\DeleteRole;

use App\Domain\Role\Role;
use ItDevgroup\CommandBus\Command;

/**
 * Class DeleteRole
 * @package App\Application\Role
 */
class DeleteRole implements Command
{
    /**
     * @var Role
     */
    private Role $role;

    /**
     * DeleteRole constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * @return Role
     */
    public function role(): Role
    {
        return $this->role;
    }
}
