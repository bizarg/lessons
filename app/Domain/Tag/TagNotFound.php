<?php

declare(strict_types=1);

namespace App\Domain\Tag;

use App\Domain\Core\EntityNotFound;

/**
 * Class TagNotFound
 * @package App\Domain\Tag
 */
class TagNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Tag with id #{$id} not found.");
    }
}
