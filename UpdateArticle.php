<?php

declare(strict_types=1);

namespace App\Application\Article\UpdateArticle;

use App\Domain\Article\Article;
use App\Http\Requests\Article\ArticleRequest;
use Illuminate\Http\Request;
use Rosamarsky\CommandBus\Command;

/**
 * Class UpdateArticle
 * @package App\Application\Article\UpdateArticle
 */
class UpdateArticle implements Command
{
    /** @var Article */
    private Article $article;

    /**
     * UpdateArticle constructor.
     * @param Article $article
     */
    public function __construct(
        Article $article
    ) {
        $this->article = $article;
    }

    /**
     * @param Request|ArticleRequest $request
     * @param Article $article
     * @return self
     */
    public static function fromRequest(Request $request, Article $article): self
    {
        return (new self(
        	$article
        ));
    }

    /** @return Article */
    public function article(): Article
    {
        return $this->article;
    }
}
