<?php

namespace App\Infrastructure\Variables;

use Bizarg\VariableParser\VariableInterface;

/**
 * Class ArticleSlug
 * @package App\Infrastructure\Variables
 */
class ArticleSlug extends Variable implements VariableInterface
{
    /**
     * @return string|null
     */
    public function handle(): ?string
    {
        return $this->data->article() ? $this->data->article()->slug : null;
    }

    /**
     * @inheritDoc
     */
    public function preview(): ?string
    {
        return 'article-slug';
    }
}
