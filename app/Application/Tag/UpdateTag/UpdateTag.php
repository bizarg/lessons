<?php

declare(strict_types=1);

namespace App\Application\Tag\UpdateTag;

use App\Domain\Tag\Tag;
use App\Http\Requests\Tag\TagRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class UpdateTag
 * @package App\Application\Tag\UpdateTag
 */
class UpdateTag implements Command
{
    /** @var Tag */
    private Tag $tag;

    /**
     * UpdateTag constructor.
     * @param Tag $tag
     */
    public function __construct(
        Tag $tag
    ) {
        $this->tag = $tag;
    }

    /**
     * @param Request|TagRequest $request
     * @param Tag $tag
     * @return self
     */
    public static function fromRequest(Request $request, Tag $tag): self
    {
        return (new self(
        	$tag
        ));
    }

    /** @return Tag */
    public function tag(): Tag
    {
        return $this->tag;
    }
}
