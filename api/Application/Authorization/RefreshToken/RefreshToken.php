<?php

namespace Api\Application\Authorization\RefreshToken;

use Psr\Http\Message\ServerRequestInterface;
use Rosamarsky\CommandBus\Command;

/**
 * Class RefreshToken
 * @package Api\Application\Auth
 */
class RefreshToken implements Command
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
