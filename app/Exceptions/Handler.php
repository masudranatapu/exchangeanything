<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Exception;
use Illuminate\Http\Response;
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
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        // $this->renderable(function (Exception $exception, $request) {
        //     if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
        //         return response()->json(['User have not permission for this page access.']);
        //     }

        //     if ($exception instanceof ModelNotFoundException) {
        //         $modelName = strtolower(class_basename($exception->getModel()));
        //         return response()->json(["errors" => [
        //             "message" => "The {$modelName} was not found in the database"
        //         ]], Response::HTTP_NOT_FOUND);
        //     }

        //     if($exception instanceof NotFoundHttpException){
        //         return response()->json(["errors" => [
        //             "message" => "The specified URL can't be found"
        //         ]], Response::HTTP_NOT_FOUND);
        //     }

        //     if($exception instanceof MethodNotAllowedHttpException){
        //         return response()->json(["errors" => [
        //             "message" => "The specified method for this request is invalid"
        //         ]], Response::HTTP_METHOD_NOT_ALLOWED);
        //     }

        //     if($exception instanceof ValidationException){
        //         return $this->convertValidationExceptionToResponse($exception, $request);
        //     }

        //     if($exception instanceof AuthenticationException){
        //         return $this->unauthenticated($request, $exception);
        //     }

        //     if($exception instanceof QueryException){
        //         $errorCode = $exception->errorInfo[1];
        //         if ($errorCode == 1451) {
        //             return response()->json(["errors" => [
        //                 "message" => "Can't remove this resource permanently. It is related with any other resource."
        //             ]], Response::HTTP_CONFLICT);
        //         }
        //     }

        //     if($exception instanceof HttpException){
        //         return response()->json(["errors" => [
        //             "message" => $exception->getMessage()
        //         ]], $exception->getStatusCode());
        //     }


        //     // return response()->json(["errors" => [
        //     //     "message" => 'Unexpected exception, please try later'
        //     // ]], 500);

        // });

    }
}
