<?php

declare(strict_types=1);

namespace App\Application\Article\UpdateArticle;

use App\Domain\Article\Article;
use App\Domain\User\User;
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
    /** @var string */
    private string $title;
    /** @var string */
    private string $body;
    /** @var int */
    private int $author;

    /**
     * UpdateArticle constructor.
     * @param Article $article
     * @param string $title
     * @param string $body
     * @param int $author
     */
    public function __construct(
        Article $article,
        string $title,
        string $body,
        int $author
    ) {
        $this->article = $article;
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
    }

    /**
     * @param Request|ArticleRequest $request
     * @param Article $article
     * @param User $user
     * @return self
     */
    public static function fromRequest(Request $request, Article $article, User $user): self
    {
        return (new self(
            $article,
            $request->title,
            $request->body,
            $request->author ?? $user->id
        ));
    }

    /** @return Article */
    public function article(): Article
    {
        return $this->article;
    }

    /** @return string */
    public function title(): string
    {
        return $this->title;
    }

    /** @return string */
    public function body(): string
    {
        return $this->body;
    }

    /** @return int */
    public function author(): int
    {
        return $this->author;
    }
}
