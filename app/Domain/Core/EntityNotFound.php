<?php

namespace App\Domain\Core;

use Exception;

/**
 * Class EntityNotFound
 * @package App\Domain\Core
 */
abstract class EntityNotFound extends Exception
{
    /**
     * EntityNotFound constructor.
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct();
        $this->message = $message;
        $this->code = 404;
    }
}
