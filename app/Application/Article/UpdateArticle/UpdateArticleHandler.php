<?php

declare(strict_types=1);

namespace App\Application\Article\UpdateArticle;

use App\Domain\Article\Article;
use App\Domain\Article\ArticleRepository;
use App\Domain\Article\ArticleService;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class UpdateArticleHandler
 * @package App\Application\Article\UpdateArticle
 */
class UpdateArticleHandler implements Handler
{
    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;
    /** @var ArticleService */
    private ArticleService $articleService;

    /**
     * UpdateArticleHandler constructor.
     * @param ArticleRepository $articleRepository
     * @param ArticleService $articleService
     */
    public function __construct(
        ArticleRepository $articleRepository,
        ArticleService $articleService
    ) {
        $this->articleRepository = $articleRepository;
        $this->articleService = $articleService;
    }

    /**
     * @param Command|UpdateArticle $command
     * @return Article
     */
    public function handle(Command $command)
    {
        $article = $command->article();

        $this->articleService->setFromCommand($command, $article);

        $this->articleRepository->store($article);

        return $article;
    }
}
