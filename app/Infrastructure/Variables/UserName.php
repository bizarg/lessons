<?php

namespace App\Infrastructure\Variables;

use Bizarg\VariableParser\VariableInterface;

/**
 * Class UserName
 * @package App\Infrastructure\Variables
 */
class UserName extends Variable implements VariableInterface
{
    /**
     * @return string|null
     */
    public function handle(): ?string
    {
        return $this->data->user() ? $this->data->user()->name : null;
    }

    /**
     * @return string
     */
    public function preview(): string
    {
        return 'User Name';
    }
}
