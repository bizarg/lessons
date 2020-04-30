<?php

declare(strict_types=1);

namespace App\Application\Article\RegisterArticle;

use App\Domain\Article\Article;
use App\Domain\Article\ArticleRepository;
use App\Domain\Article\ArticleService;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class RegisterArticleHandler
 * @package App\Application\Article
 */
class RegisterArticleHandler implements Handler
{
    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;
    /** @var ArticleService */
    private ArticleService $articleService;

    /**
     * RegisterArticleHandler constructor.
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
     * @param Command|RegisterArticle $command
     * @return Article
     */
    public function handle(Command $command)
    {
        $article = new Article();

        $this->articleService->setFromCommand($command, $article);

        $this->articleRepository->store($article);

        return $article;
    }
}
