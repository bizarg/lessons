<?php

declare(strict_types=1);

namespace App\Application\Tag\RegisterTag;

use App\Domain\Tag\Tag;
use App\Domain\Tag\TagRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class RegisterTagHandler
 * @package App\Application\Tag
 */
class RegisterTagHandler implements Handler
{
    /**
     * @var TagRepository
     */
    private TagRepository $tagRepository;

    /**
     * RegisterTagHandler constructor.
     * @param TagRepository $tagRepository
     */
    public function __construct(
        TagRepository $tagRepository
    ) {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param Command|RegisterTag $command
     * @return Tag
     */
    public function handle(Command $command)
    {
        $tag = new Tag();

        $this->tagRepository->store($tag);

        return $tag;
    }
}
