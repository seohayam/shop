<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:store_owner')->except('logout');
    }

    public function showStoreOwnerLoginForm()
    {
        // blade側で表示内容の変更が可能
        return view('auth.login', ['authgroup' => 'store_owner']);
    }

    public function storeOwnerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6',
        ]); 

        // エラー分が出てるが気にしない
        if(Auth::guard('store_owner')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember') ))
        {
            // 元々行こうとしていたURLへ移動、引数＝元々行こうとしていた場所へ行けなかった時
            return redirect()->intended('/store_owner');
        }

        return back()->withInput($request->only('email','remember'));
    }


}
