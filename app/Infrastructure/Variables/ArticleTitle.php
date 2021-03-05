<?php

namespace App\Infrastructure\Variables;

use Bizarg\VariableParser\VariableInterface;

/**
 * Class ArticleEmail
 * @package App\Infrastructure\Variables
 */
class ArticleTitle extends Variable implements VariableInterface
{
    /**
     * @inheritDoc
     */
    public function handle(): ?string
    {
        return $this->data->article() ? $this->data->article()->title : null;
    }

    /**
     * @inheritDoc
     */
    public function preview(): ?string
    {
        return 'article title';
    }
}
