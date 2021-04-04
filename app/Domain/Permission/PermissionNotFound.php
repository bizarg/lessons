<?php

declare(strict_types=1);

namespace App\Domain\Permission;

use App\Domain\Core\EntityNotFound;

/**
 * Class PermissionNotFound
 * @package App\Domain\Permission
 */
class PermissionNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Permission with id #{$id} not found.");
    }
}
