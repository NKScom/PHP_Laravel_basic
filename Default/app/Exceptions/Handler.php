<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use TCG\Voyager\Facades\Voyager;

use Carbon\Carbon;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // if($this->isHttpException($e))
        // {
        //     switch ($e->getStatusCode()) 
        //         {
        //         // not found
        //         case 404:
        //             return redirect('404');
        //             break;

        //         // internal error
        //         case '500':
        //             return view("errors.error");
        //             break;

        //         case 401:
        //             return redirect()->back()->with([
        //                 'message'    => "You do not have permission to access this area",
        //                 'alert-type' => 'error'
        //             ]);
        //             break;

        //         default:
        //             return view("errors.error");
        //         break;

        //     }
        // }
        // elseif($this->isTokenMismatchException($e)){

        //     return view("errors.error");
            
        // }
        // else
        // {   
            return parent::render($request, $e);
        // }
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {

            return response()->json(['error' => 'Unauthenticated.'], 401);

        }

        return redirect()->guest(route('login'));
    }
}
