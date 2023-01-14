<?php

namespace App\Exceptions;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;
use Yajra\DataTables\Exceptions\Exception;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $exception, $request) {
            if ($request->wantsJson()) {

                switch ($exception) {
                    case $exception instanceof Exception:
                        return response([
                            'draw' => 0,
                            'recordsTotal' => 0,
                            'recordsFiltered' => 0,
                            'data' => [],
                            'error' => 'Error',
                        ]);
                    case $exception instanceof ValidationException:

                        return Controller::getJsonResponse('invalid_data',
                            $exception->errors(), false, Response::HTTP_UNPROCESSABLE_ENTITY);

                    case $exception instanceof AuthenticationException:

                        return Controller::getJsonResponse('unauthorized', [],
                            false, Response::HTTP_UNAUTHORIZED);

                    case $exception instanceof RecordsNotFoundException
                        or $exception instanceof NotFoundHttpException
                        or $exception instanceof FileNotFoundException
                        or $exception instanceof RouteNotFoundException:

                        return Controller::getJsonResponse($exception->getMessage(), [],
                            false, Response::HTTP_NOT_FOUND);

                    default:

                        return Controller::getJsonResponse('internal_server_error', $exception->getMessage(),
                            false, Response::HTTP_INTERNAL_SERVER_ERROR, $exception->getTraceAsString());

                }
            }
        });
    }
}
