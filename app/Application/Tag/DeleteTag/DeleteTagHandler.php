<?php

declare(strict_types=1);

namespace App\Application\Tag\DeleteTag;

use App\Domain\Tag\TagRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class DeleteTagHandler
 * @package App\Application\Tag
 */
class DeleteTagHandler implements Handler
{
    /** @var TagRepository */
    private TagRepository $tagRepository;

    /**
     * DeleteTagHandler constructor.
     * @param TagRepository $tagRepository
     */
    public function __construct(
        TagRepository $tagRepository
    ) {
        $this->tagRepository = $tagRepository;
    }
    /**
     * Handle a Command object
     *
     * @param Command|DeleteTag $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $this->tagRepository->delete($command->tag());
    }
}
