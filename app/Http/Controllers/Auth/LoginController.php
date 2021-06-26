<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\StoreOwner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

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
        // 同時ログインを防ぐ
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:store_owner')->except('logout');
    }

    public function showStoreOwnerLoginForm()
    {
        // blade側で表示内容の変更が可能
        return view('auth.login', ['authgroup' => 'store_owners']);
    }


    // ストアでログインできた際の行先指定
    public function storeOwnerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6',
        ]);

        // エラー分が出てるが気にしない
        if(Auth::guard('store_owner')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember') ))
        {
            // ストアでログインできた際の行先
            return redirect()->intended(route('home.index'));
        }

        return back()->withInput($request->only('email','remember'));
    }


    // googleLogin
    public function redirectToGoogle()
    {
        // Google へのリダイレクト
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // Google 認証後の処理
        $gUser = Socialite::driver('google')->stateless()->user();

        $preUrl = url()->previous();
        $preUrl = $preUrl;

        var_dump($preUrl);

        if(str_contains($preUrl, "type=user") == true){

            $user = User::where('email', $gUser->email)->first();

            // 見つからなければ新しくユーザーを作成
            if ($user == null) {
                $user = $this->createUserByGoogle($gUser);
            }
            // ログイン処理
            // Auth::login($user, true);
            Auth::guard('user')->login($user);
            return redirect('/');

        }elseif(str_contains($preUrl, "type=store_owner") == true){

            $storeOnwer = StoreOwner::where('email', $gUser->email)->first();

            // 見つからなければ新しくユーザーを作成
            if ($storeOnwer == null) {
                $storeOnwer = $this->createStoreOwnerByGoogle($gUser);
            }
            // ログイン処理
            Auth::guard('store_owner')->login($storeOnwer);
            return redirect('/');

        }else{

            return redirect('/')->with('error', 'Google アカウントを使用に慣れませんでした。');
        }

    }

    public function createUserByGoogle($gUser)
    {
        $user = User::create([
            'name'     => $gUser->name,
            'email'    => $gUser->email,
            'password' => Hash::make(uniqid()),
        ]);
        return $user;
    }

    public function createStoreOwnerByGoogle($gUser)
    {
        $user = StoreOwner::create([
            'name'     => $gUser->name,
            'email'    => $gUser->email,
            'password' => Hash::make(uniqid()),
        ]);
        return $user;
    }

}
