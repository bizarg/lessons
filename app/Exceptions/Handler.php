<?php

namespace App\Exceptions;

use App\Domain\Core\EntityNotFound;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

/**
 * Class Handler
 * @package App\Exceptions
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthenticationException::class,
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        TokenMismatchException::class,
        ValidationException::class,
    ];

    /**
     * @param Throwable $exception
     * @throws Exception
     */
    public function report($exception)
    {
        parent::report($exception);
    }

    /**
     * @param Request $request
     * @param Throwable $exception
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        Log::error($exception->getMessage() . ' ' . $exception->getTraceAsString());

        if ($this->checkByNotFound($exception) && $request->expectsJson()) {
            return response()->json(
                [
                    'errors' => [
                        [
                            'detail' => __('common.not_found'),
                            'status' => Response::HTTP_NOT_FOUND
                        ]
                    ],
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        if ($exception instanceof ValidationException && $request->expectsJson()) {
            $errors = [];

            foreach ($exception->errors() as $key => $error) {
                Collection::make($error)->each(
                    function (string $message) use ($key, &$errors) {
                        $errors[] = [
                            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                            'detail' => $message,
                            'source' => [
                                'parameter' => $key
                            ]
                        ];
                    }
                );
            }
            return response()->json(['errors' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($this->checkAuthException($exception) && $request->expectsJson()) {
            return response()->json(
                [
                    'errors' => [
                        [
                            'detail' => __('auth.unauthenticated'),
                            'status' => Response::HTTP_UNAUTHORIZED
                        ]
                    ],
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }

//        if ($exception instanceof Exception) {
//            return response()->json(
//                [
//                    'errors' => [
//                        [
//                            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
//                            'detail' => $exception->getMessage(),
//                        ]
//                    ]
//                ],
//                Response::HTTP_INTERNAL_SERVER_ERROR
//            );
//        }

        return parent::render($request, $exception);
    }

    /**
     * @param Throwable $exception
     * @return bool
     */
    private function checkByNotFound(Throwable $exception)
    {
        return $exception instanceof ModelNotFoundException
            || $exception instanceof NotFoundHttpException
            || $exception instanceof EntityNotFound;
    }

    /**
     * @param Throwable $exception
     * @return bool
     */
    private function checkAuthException(Throwable $exception)
    {
        return $exception instanceof AuthenticationException
            || $exception instanceof AuthorizationException;
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param Request $request
     * @param AuthenticationException $exception
     * @return JsonResponse|RedirectResponse|Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
}
