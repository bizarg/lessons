<?php

namespace App\Infrastructure\Variables;

use App\Infrastructure\Services\VariableData;

/**
 * Class Variable
 * @package App\Infrastructure\Variables
 */
class Variable
{
    /**
     * @var mixed
     */
    protected $data;

    /**
     * Variable constructor.
     * @param mixed $data
     */
    public function __construct(VariableData $data)
    {
        $this->data = $data;
    }
}
