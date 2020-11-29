<?php

declare(strict_types=1);

namespace App\Application\Tag\GetTagList;

use App\Domain\Tag\TagRepository;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class GetTagListHandler
 * @package App\Application\LeadStatus\GetLeadStatusList
 */
class GetTagListHandler implements Handler
{
    /**
     * @var TagRepository
     */
    private TagRepository $tagRepository;

    /**
     * GetLeadStatusListHandler constructor.
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
     * @param Command|GetTagList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
		return $this->tagRepository->collection();
    }
}
