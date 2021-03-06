<?php

namespace App\Application\Authorization\Login;

use Psr\Http\Message\ServerRequestInterface;
use ItDevgroup\CommandBus\Command;

/**
 * Class Login
 * @package App\Application\Authorization
 */
class Login implements Command
{
    /**
     * @var ServerRequestInterface
     */
    private ServerRequestInterface $request;

    /**
     * Login constructor.
     * @param ServerRequestInterface $request
     */
    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return ServerRequestInterface
     */
    public function request(): ServerRequestInterface
    {
        return $this->request;
    }
}
