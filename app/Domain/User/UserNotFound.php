<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\Core\EntityNotFound;

/**
 * Class UserNotFound
 * @package App\Domain\User
 */
class UserNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("User with id #{$id} not found.");
    }
}
