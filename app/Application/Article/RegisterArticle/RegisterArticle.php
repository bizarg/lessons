<?php

declare(strict_types=1);

namespace App\Application\Article\RegisterArticle;

use App\Domain\User\User;
use App\Http\Requests\Article\ArticleRequest;
use Illuminate\Http\Request;
use ItDevgroup\CommandBus\Command;

/**
 * Class RegisterArticle
 * @package App\Application\Article
 */
class RegisterArticle implements Command
{
    /** @var array */
    private array $title;
    /** @var array */
    private array $body;
    /** @var int */
    private int $author;
    /** @var array|null */
    private ?array $tags;

    /**
     * RegisterArticle constructor.
     * @param array $title
     * @param array $body
     * @param int $author
     * @param array|null $tags
     */
    public function __construct(
        array $title,
        array $body,
        int $author,
        ?array $tags
    ) {
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
        $this->tags = $tags;
    }

    /**
     * @param Request|ArticleRequest $request
     * @param User $user
     * @return RegisterArticle
     */
    public static function fromRequest(Request $request, User $user)
    {
        return (new self(
            $request->title,
            $request->body,
            $request->author ?? $user->id,
            $request->tags
        ));
    }

    /** @return array */
    public function title(): array
    {
        return $this->title;
    }

    /** @return array */
    public function body(): array
    {
        return $this->body;
    }

    /** @return int */
    public function author(): int
    {
        return $this->author;
    }

    /** @return array|null */
    public function tags(): ?array
    {
        return $this->tags;
    }
}
