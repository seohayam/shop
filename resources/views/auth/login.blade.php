@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-main">{{  isset($authgroup) ? "ストアオーナー" : "" }} {{ __('ログイン') }}</div>

                <div class="card-body">
                    @isset($authgroup)
                        <form method="POST" action="{{ url("$authgroup/login") }}">
                    @else
                        <form method="POST" action="{{ route('login') }}">
                    @endisset
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('次回以降自動入力') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <a class="text-point" href="{{ isset($authgroup) ? route('store_owner.register') : route('register') }}">新規登録の方はこちら</a>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-second col-12 mb-2">
                                    {{ __('ログイン') }}
                                </button>
                                
                                @if(Request::is('users/*'))
                                <a href="{{ route('google.login', ['type' => 'user']) }}" class="btn btn-block btn-social btn-google text-white col-12" style="background-color: #DD4B39">
                                    <span class="fab fa-google"></span>oogleアカウントでログイン
                                  </a>
                                @endif

                                @if(Request::is('store_owners/*'))
                                <a href="{{ route('google.store_owner', ['type' => 'store_owner']) }}" class="btn btn-block btn-social btn-google text-white col-12" style="background-color: #DD4B39">
                                    <span class="fab fa-google"></span>oogleアカウントでログイン
                                  </a>
                                @endif

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
