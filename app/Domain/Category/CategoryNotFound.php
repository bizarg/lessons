<?php

declare(strict_types=1);

namespace App\Domain\Category;

use App\Domain\Core\EntityNotFound;

/**
 * Class CategoryNotFound
 * @package App\Domain\Category
 */
class CategoryNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Category with id #{$id} not found.");
    }
}
