<?php

namespace App\Application\Authorization\Login;

use App\Domain\User\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\Exceptions\OAuthServerException;
use Laravel\Passport\Http\Controllers\HandlesOAuthErrors;
use League\OAuth2\Server\AuthorizationServer;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

/**
 * Class LoginHandler
 * @package App\Application\Authorization
 */
class LoginHandler implements Handler
{
    use HandlesOAuthErrors;

    /**
     * @var AuthorizationServer
     */
    private AuthorizationServer $server;

    /**
     * LoginHandler constructor.
     * @param AuthorizationServer $server
     */
    public function __construct(
        AuthorizationServer $server
    ) {
        $this->server = $server;
    }


    /**
     * @param Command|Login $command
     * @return array
     * @throws ValidationException
     * @throws OAuthServerException
     */
    public function handle(Command $command): array
    {
        $array = $command->request()->getParsedBody();

        $user = User::where('email', $array['email'])->first();

        if (is_null($user) || !Hash::check($array['password'], $user->password)) {
            throw ValidationException::withMessages([
                'error' => 'Credentials are incorrect'
            ]);
        }

        $client = DB::table('oauth_clients')->where('password_client', true)->first();

        $array['username'] = $array['email'];
        $array['client_id'] = $client->id;
        $array['client_secret'] = $client->secret;
        $array['scope'] = '*';
        $array['grant_type'] = 'password';

        $request = $command->request()->withParsedBody($array);

        $res = $this->withErrorHandling(function () use ($request) {
            return $this->convertResponse(
                $this->server->respondToAccessTokenRequest($request, new Response())
            );
        });

        $res = json_decode($res->getContent(), true);

        if (!isset($res['error'])) {
            $user->save();
        }

        return $res;
    }
}
