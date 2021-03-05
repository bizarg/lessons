<?php

namespace App\Infrastructure\Variables;

use Bizarg\VariableParser\VariableInterface;

/**
 * Class UserEmail
 * @package App\Infrastructure\Variables
 */
class UserEmail extends Variable implements VariableInterface
{
    /**
     * @inheritDoc
     */
    public function handle(): ?string
    {
        return $this->data->user() ? $this->data->user()->email : null;
    }

    /**
     * @inheritDoc
     */
    public function preview(): ?string
    {
        return 'test@test.com';
    }
}
