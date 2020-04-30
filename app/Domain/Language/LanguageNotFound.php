<?php

declare(strict_types=1);

namespace App\Domain\Language;

use App\Domain\Core\EntityNotFound;

/**
 * Class LanguageNotFound
 * @package App\Domain\Language
 */
class LanguageNotFound extends EntityNotFound
{
    /**
     * @param int $id
     * @return self
     */
    public static function fromId(int $id): self
    {
        return new self("Language with id #{$id} not found.");
    }
}
