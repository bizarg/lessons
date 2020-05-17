<?php

declare(strict_types=1);

namespace App\Domain\Notification;

use App\Domain\Core\EntityNotFound;

/**
 * Class NotificationNotFound
 * @package App\Domain\Notification
 */
class NotificationNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Notification with id #{$id} not found.");
    }
}
