<?php

declare(strict_types=1);

namespace App\Domain\Article;

use App\Domain\Core\EntityNotFound;

/**
 * Class ArticleNotFound
 * @package App\Domain\Article
 */
class ArticleNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Article with id #{$id} not found.");
    }
}
