<?php

namespace Tests\Feature;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Response;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Tests\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Tests\Feature
 */
abstract class TestCase extends BaseTestCase
{
    /** @var string|null */
    private $token = null;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware(ThrottleRequests::class);
    }

    /**
     * Sign in
     * @param string $email
     * @return array
     */
    public function signIn($email = 'test@test.com'): array
    {

        $res = $this->json('post', route('api.auth.login'), [
            'email' => $email,
            'password' => 'ntgkjdjp'
        ]);

        $result = json_decode($res->content(), true)['data']['attributes'];

        $this->token = $result['accessToken'];

        return $result;
    }

    /**
     * @param $name
     * @return array
     */
    protected function errorRequiredField($name): array
    {
        $lowerCaseName = strtolower(preg_replace('/([A-Z]+)/', ' $1', $name));
        return  [
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'detail' => "The {$lowerCaseName} field is required.",
            'source' => [
                'parameter' => $name
            ],
        ];
    }

    /**
     * @return array
     */
    protected function errorPageNotFound(): array
    {
        return [
            'detail' => 'Page not found.',
            'status' => Response::HTTP_NOT_FOUND
        ];
    }

    /**
     * @return array
     */
    protected function headers(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->token
        ];
    }
}

