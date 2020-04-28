<?php

namespace Api\Application\Authorization\RefreshToken;

use Illuminate\Support\Facades\DB;
use Laravel\Passport\Exceptions\OAuthServerException;
use Laravel\Passport\Http\Controllers\HandlesOAuthErrors;
use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Parser as JwtParser;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;
use Zend\Diactoros\Response as Psr7Response;
use League\OAuth2\Server\AuthorizationServer;

/**
 * Class RefreshTokenHandler
 * @package Api\Application\Auth
 */
class RefreshTokenHandler implements Handler
{
    use HandlesOAuthErrors;

    /**
     * The authorization server.
     *
     * @var AuthorizationServer
     */
    protected AuthorizationServer $server;
    /**
     * The token repository instance.
     *
     * @var TokenRepository
     */
    protected TokenRepository $tokens;
    /**
     * The JWT parser instance.
     *
     * @var JwtParser
     */
    protected JwtParser $jwt;

    /**
     * Create a new controller instance.
     *
     * @param AuthorizationServer $server
     * @param TokenRepository $tokens
     * @param JwtParser $jwt
     * @return void
     */
    public function __construct(
        AuthorizationServer $server,
        TokenRepository $tokens,
        JwtParser $jwt
    ) {
        $this->jwt = $jwt;
        $this->server = $server;
        $this->tokens = $tokens;
    }


    /**
     * Handle a Command object
     *
     * @param Command|RefreshToken $command
     * @return array
     * @throws OAuthServerException
     */
    public function handle(Command $command): array
    {
        $array = $command->request()->getParsedBody();
        $client = DB::table('oauth_clients')->where('password_client', true)
            ->first();
        $body = $command->request()->getParsedBody();
        $array['refresh_token'] = $body['refreshToken'];
        $array['client_id'] = $client->id;
        $array['client_secret'] = $client->secret;
        $array['scope'] = '*';
        $array['grant_type'] = 'refresh_token';
        $request = $command->request()->withParsedBody($array);

        $res = $this->withErrorHandling(function () use ($request) {
            return $this->convertResponse(
                $this->server->respondToAccessTokenRequest($request, new Psr7Response())
            );
        });
        return json_decode($res->getContent(), true);
    }
}
