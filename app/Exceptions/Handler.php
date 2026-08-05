<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Arr;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
        'arrive_whats_token',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($request->is('api/*') || $request->expectsJson()) {
            return $this->handleApiError($e);
        }

        return parent::render($request, $e);
    }

    /**
     * Handle error formatting for API requests.
     *
     * @param \Throwable $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function handleApiError(Throwable $e)
    {
        $status = 500;
        $message = 'Something went wrong. Please try again later.';
        $errors = null;

        if ($e instanceof ValidationException) {
            $status = 422;
            $message = $e->getMessage();
            $errors = $e->errors();
        } elseif ($e instanceof AuthenticationException) {
            $status = 401;
            $message = $e->getMessage() ?: 'Unauthenticated';
        } elseif ($e instanceof AuthorizationException || $e instanceof AccessDeniedHttpException) {
            $status = 403;
            $message = $e->getMessage() ?: 'This action is unauthorized.';
        } elseif ($e instanceof NotFoundHttpException || $e instanceof ModelNotFoundException) {
            $status = 404;
            $message = 'Resource not found.';
        } elseif ($e instanceof HttpException) {
            $status = $e->getStatusCode();
            $message = $e->getMessage();
        } else {
            // Unhandled server error (500)
            if (config('app.debug')) {
                $message = $e->getMessage();
                $errors = [
                    'exception' => get_class($e),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => collect($e->getTrace())->take(10)->map(function ($trace) {
                        return Arr::except($trace, ['args']);
                    })->all(),
                ];
            }
        }

        $response = [
            'success' => false,
            'message' => $message,
        ];

        if ($errors !== null) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $status);
    }
}
