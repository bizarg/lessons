<?php

declare(strict_types=1);

namespace App\Application\Tag\UpdateTag;

use App\Domain\Tag\Tag;
use App\Domain\Tag\TagRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class UpdateTagHandler
 * @package App\Application\Tag\UpdateTag
 */
class UpdateTagHandler implements Handler
{
    /**
     * @var TagRepository
     */
    private TagRepository $tagRepository;

    /**
     * UpdateTagHandler constructor.
     * @param TagRepository $tagRepository
     */
    public function __construct(
        TagRepository $tagRepository
    ) {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param Command|UpdateTag $command
     * @return Tag
     */
    public function handle(Command $command)
    {
        $tag = $command->tag();

        $this->tagRepository->store($tag);

        return $tag;
    }
}
