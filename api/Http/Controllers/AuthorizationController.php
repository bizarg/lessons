<?php

declare(strict_types=1);

namespace Api\Http\Controllers;

use Api\Application\Authorization\Login\Login;
use Api\Application\Authorization\Logout\Logout;
use Api\Application\Authorization\RefreshToken\RefreshToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class AuthorizationController
 * @package Api\Http\Controllers
 */
class AuthorizationController extends Controller
{
    /**
     * @param ServerRequestInterface $request
     * @return JsonResponse
     */
    public function login(ServerRequestInterface $request): JsonResponse
    {
        $token = $this->dispatchCommand(new Login($request));

        if (isset($token['error'])) {
            return \response()->json([
                'errors' => [
                    [
                        'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                        'detail' => $token['message'],
                    ]
                ]
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return \response()->json([
            'data' => [
                'type' => 'token',
                'attributes' => [
                    'tokenType' => $token['token_type'],
                    'expiresIn' => $token['expires_in'],
                    'accessToken' => $token['access_token'],
                    'refreshToken' => $token['refresh_token'],
                ],
            ]
        ]);
    }

    /**
     * @param ServerRequestInterface $request
     * @return JsonResponse
     */
    public function refreshToken(ServerRequestInterface $request): JsonResponse
    {
        $token = $this->dispatch(new RefreshToken($request));

        if (isset($token['error'])) {
            return \response()->json([
                'errors' => [
                    [
                        'code' => Response::HTTP_UNAUTHORIZED,
                        'detail' => $token['message'] ?? '',
                    ]
                ]
            ], Response::HTTP_UNAUTHORIZED);
        }
        return \response()->json([
            'data' => [
                'type' => 'token',
                'attributes' => [
                    'tokenType' => $token['token_type'],
                    'expiresIn' => $token['expires_in'],
                    'accessToken' => $token['access_token'],
                    'refreshToken' => $token['refresh_token'],
                ],
            ]
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->dispatch(new Logout());
        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
