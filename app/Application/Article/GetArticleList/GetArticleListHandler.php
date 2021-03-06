<?php

declare(strict_types=1);

namespace App\Application\Article\GetArticleList;

use App\Domain\Article\ArticleRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class GetArticleListHandler
 * @package App\Application\LeadStatus\GetLeadStatusList
 */
class GetArticleListHandler implements Handler
{
    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;

    /**
     * GetLeadStatusListHandler constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(
        ArticleRepository $articleRepository
    ) {
        $this->articleRepository = $articleRepository;
    }
    /**
     * Handle a Command object
     *
     * @param Command|GetArticleList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
		return $this->articleRepository->setFilter($command->filter())->setOrder($command->order())
			->pagination($command->pagination());
    }
}
