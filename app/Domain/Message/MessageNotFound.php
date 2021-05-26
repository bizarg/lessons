<?php

declare(strict_types=1);

namespace App\Domain\Message;

use App\Domain\Core\EntityNotFound;

/**
 * Class MessageNotFound
 * @package App\Domain\Message
 */
class MessageNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Message with id #{$id} not found.");
    }
}
