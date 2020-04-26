<?php

declare(strict_types=1);

namespace App\Application\Article\DeleteArticle;

use App\Domain\Article\Article;
use Rosamarsky\CommandBus\Command;

/**
 * Class DeleteArticle
 * @package App\Application\Article
 */
class DeleteArticle implements Command
{
    /** @var Article */
    private Article $article;

    /**
     * DeleteArticle constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /** @return Article */
    public function article(): Article
    {
        return $this->article;
    }
}
