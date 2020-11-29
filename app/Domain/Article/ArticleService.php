<?php

declare(strict_types=1);

namespace App\Domain\Article;

use App\Application\Article\RegisterArticle\RegisterArticle;
use Rosamarsky\CommandBus\Command;

/**
 * Class ArticleService
 * @package App\Domain\Article
 */
class ArticleService
{
    /**
     * @param Command|RegisterArticle $command
     * @param Article $article
     */
    public function setFromCommand(Command $command, $article)
    {
        $article->getSlugOptions();
        $article->setTranslations('title', $command->title());
        $article->setTranslations('body', $command->body());
        $article->author_id = $command->author();
    }
}
