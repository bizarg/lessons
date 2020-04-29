<?php

declare(strict_types=1);

namespace App\Application\Article\RegisterArticle;

use App\Domain\Article\Article;
use App\Domain\Article\ArticleRepository;
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

    /**
     * RegisterArticleHandler constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(
        ArticleRepository $articleRepository
    ) {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param Command|RegisterArticle $command
     * @return Article
     */
    public function handle(Command $command)
    {
        $article = new Article();

        $this->articleRepository->store($article);

        return $article;
    }
}
