@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-main">{{ isset($authgroup) ? "ストアオーナー" : "" }} {{ __('新規登録') }}</div>

                <div class="card-body">
                    @isset($authgroup)
                        <form method="POST" action="{{ route("store_owner.register") }}">
                    @else
                        <form method="POST" action="{{ route('register') }}">
                    @endisset
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('確認パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="もう一度パスワードを入力してください">
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-12">
                                <button type="submit" class="btn bg-second col-12">
                                    {{ __('新規登録') }}
                                </button>
                            </div>
                        </div>


                        @if(Request::is('users/*'))
                            <a href="{{ route('google.login', ['type' => 'user']) }}" class="btn btn-block btn-social btn-google text-white col-12" style="background-color: #DD4B39">
                                <span class="fab fa-google"></span>oogleアカウントで新規登録
                                </a>
                            @endif

                            @if(Request::is('store_owners/*'))
                            <a href="{{ route('google.store_owner', ['type' => 'store_owner']) }}" class="btn btn-block btn-social btn-google text-white col-12" style="background-color: #DD4B39">
                                <span class="fab fa-google"></span>oogleアカウントで新規登録
                            </a>
                        @endif


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
