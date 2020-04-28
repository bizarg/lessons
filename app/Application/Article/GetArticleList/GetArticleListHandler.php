<?php

declare(strict_types=1);

namespace App\Application\Article\GetArticleList;

use App\Domain\Article\ArticleRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

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
     * @param Command|GetArticleList $command
     * @return LengthAwarePaginator
     */
    public function handle(Command $command): LengthAwarePaginator
    {
        return $this->articleRepository->setFilter($command->filter())->setOrder($command->order())
            ->paginate($command->pagination());
    }
}
