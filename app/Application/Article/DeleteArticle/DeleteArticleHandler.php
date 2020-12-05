<?php

declare(strict_types=1);

namespace App\Application\Article\DeleteArticle;

use App\Domain\Article\ArticleRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class DeleteArticleHandler
 * @package App\Application\Article
 */
class DeleteArticleHandler implements Handler
{
    /** @var ArticleRepository */
    private ArticleRepository $articleRepository;

    /**
     * DeleteArticleHandler constructor.
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
     * @param Command|DeleteArticle $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $this->articleRepository->delete($command->article());
    }
}
