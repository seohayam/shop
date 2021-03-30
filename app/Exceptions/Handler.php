<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Illuminate\Support\Facades\Auth;
use Throwable;

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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    // public function render($request, Exception $exception)
    // {
    //     return parent::render($request, $exception);
    // }

    /**
     * 認証してない場合
     * 401 -> store_owner , user
     * 
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

     public function unauthenticated($request, AuthenticationException $exception){        

        $redirectTo = in_array('store_owner', $exception->guards(), true) ? 'store_owner.login' : 'login';

        return $request->expectsJson()
        ? response()->json(['message' => $exception->getMessage()], 401)
        : redirect()->guest((route($redirectTo)));

        

        // // Jsonで返す
        // if($request->expectsJson()){
        //     return response()->json(['messgae' => $exception->getMessage()],401);
        // }
        
        // // owner_sotreをひっかける
        // if($request->is('store_owner') || $request->is('store_owner/*') ) {
        //     return redirect()->guest('store_owner/login');
        // }

        // return redirect()->guest($exception->redirectTo() ?? route('login'));

    }


    // public function render($request, Exception $exception)
    // {
    //     if($exception instanceof TokenMismatchException)
    //     {
    //         return redirect('/login')->with('message', 'セッションが切れてしまいました。もう一度ログインしてください');
    //     }

    //     return parent::render($request, $exception);
    // }
 
    public function render($request, Throwable $exception)
    {
        // TokenMismatchException 例外発生時
        if($exception instanceof \Illuminate\Session\TokenMismatchException) {
            // ログアウトリクエスト時は、強制的にログアウト
            if($request->is('logout')) {
                return redirect('/login')->with('message', 'セッションが切れてしまいました。もう一度ログインしてください');
            }
        }
 
        return parent::render($request, $exception);
    }
}
