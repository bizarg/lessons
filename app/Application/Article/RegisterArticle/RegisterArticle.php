<?php

declare(strict_types=1);

namespace App\Application\Article\RegisterArticle;

use App\Http\Requests\Article\ArticleRequest;
use Illuminate\Http\Request;
use Rosamarsky\CommandBus\Command;

/**
 * Class RegisterArticle
 * @package App\Application\Article
 */
class RegisterArticle implements Command
{
    /**
     * RegisterArticle constructor.
     */
    public function __construct(
    ) {
    }

    /**
     * @param Request|ArticleRequest $request
     * @return RegisterArticle
     */
    public static function fromRequest(Request $request)
    {
        return (new self(
        ));
    }
}
