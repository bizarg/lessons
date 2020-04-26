<?php

declare(strict_types=1);

namespace App\Application\Article\UpdateArticle;

use App\Domain\Article\Article;
use App\Domain\Article\ArticleRepository;
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

    /**
     * UpdateArticleHandler constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(
        ArticleRepository $articleRepository
    ) {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param Command|UpdateArticle $command
     * @return Article
     */
    public function handle(Command $command)
    {
        $article = $command->article();

        $this->articleRepository->store($article);

        return $article;
    }
}
