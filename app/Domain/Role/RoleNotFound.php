<?php

declare(strict_types=1);

namespace App\Domain\Role;

use App\Domain\Core\EntityNotFound;

/**
 * Class RoleNotFound
 * @package App\Domain\Role
 */
class RoleNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Role with id #{$id} not found.");
    }
}
