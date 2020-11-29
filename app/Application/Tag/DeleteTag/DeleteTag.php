<?php

declare(strict_types=1);

namespace App\Application\Tag\DeleteTag;

use App\Domain\Tag\Tag;
use Rosamarsky\CommandBus\Command;

/**
 * Class DeleteTag
 * @package App\Application\Tag
 */
class DeleteTag implements Command
{
    /** @var Tag */
    private Tag $tag;

    /**
     * DeleteTag constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /** @return Tag */
    public function tag(): Tag
    {
        return $this->tag;
    }
}
