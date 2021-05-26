<?php

declare(strict_types=1);

namespace App\Domain\Room;

use App\Domain\Core\EntityNotFound;

/**
 * Class RoomNotFound
 * @package App\Domain\Room
 */
class RoomNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Room with id #{$id} not found.");
    }
}
