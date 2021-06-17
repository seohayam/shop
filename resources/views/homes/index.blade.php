{{-- smooth scroll = .smooth --}}
@extends('layouts.app')

@section('content')

<a id="explanation_btn" href="#home_content" class="smooth border rounded-circle p-1 shadow-lg bg-white">
    <i class="far fa-3x fa-question-circle text-dark"></i>
</a>

<div id="home_top" class="container-fluid d-flex align-items-center p-5 p-sm-0 pl-sm-5 border-bottom">
    <div class="col-sm-4 p-0 d-flex flex-column">
        <h1 class="mb-5">CoShop</h1>
        <h5 class="mb-5">ネットショップの商品を実際の店舗に置いてもらう事を可能にします。買う人が商品を手にとって確かめてもらいながらもネットショップで販売する事ができます。リアルとインターネットをつなげたサービスです。</h5>
        <div class="shadow-lg border rounded p-3 text-center mb-5">
            <a href="{{ route('login') }}" class="btn border-dark col-12 mb-2">ログイン</a>
            <a href="{{ route('store_owner.login') }}" class="btn bg-point text-main border-dark col-12">ストアオーナーの方はこちら</a>
        </div>
        </div>
    </div>
</div>

<div id="home_content" class="contaienr-fluid">
    {{-- ナビ --}}
    <h3 class="border-bottom tex-title text-center bg-main m-0 py-5">使い道を選ぼう</h3>
    <ul class="nav nav-tabs w-100 text-center m-0 d-flex flex-column flex-sm-row" id="myTab" role="tablist">
        <li class="nav-item col-sm-4 bg-main d-flex justify-content-center align-items-center flex-column py-5">
            <h5 class="text-title m-0">商品を探す</h5>
            <img class="my-5" src="img/nav/search.svg" height="150px" alt="">
            <a class="col-sm-6 btn bg-second active smooth-menue" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">詳細</a>
        </li>
        <li class="nav-item col-sm-4 bg-second d-flex justify-content-center align-items-center flex-column py-5 smooth">
            <h5 class="text-title m-0">商品を出品する</h5>
            <img class="my-5" src="img/nav/ship.svg" height="150px" alt="">
            <a class="col-sm-6 btn bg-point smooth-menue" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">詳細</a>
        </li>
        <li class="nav-item col-sm-4 bg-point d-flex justify-content-center align-items-center flex-column py-5">
            <h5 class="text-title m-0">お店のスペースを貸す</h5>
            <img class="my-5" src="img/nav/share.svg" height="150px" alt="">
            <a class="col-sm-6 btn bg-second smooth-menue" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">詳細</a>
        </li>
    </ul>

    {{-- 内容 --}}
    <div class="tab-content">
        {{-- ===user=== --}}
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div>
                <h3 class="text-center text-title bg-main m-0 py-5"><u>商品を探す</u></h3>
            </div>
            {{-- ===1=== --}}
            <div class="container-fluid py-5 bg-main d-flex flex-column flex-sm-row">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">1.First</h5>
                        <img class="my-5" src="img/user/search.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">欲しい物を見つけよう！</h5>
                        <p class="text-subTitle">
                            普段はネットショップでしか売られていない商品がお店に置いてあり、実際にとって試せる！欲しい商品を見つけて見に行ってみよう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===2=== --}}
            <div class="container-fluid py-5 bg-second d-flex flex-column flex-sm-row-reverse">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">2.Second</h5>
                        <img class="my-5" src="img/user/go.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">お店に行こう！</h5>
                        <p class="text-subTitle">
                            欲しいものが見つかったらお店に行って商品を実際にみよう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===3=== --}}
            <div class="container-fluid row py-5 bg-main d-flex flex-column flex-sm-row">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">3.Third</h5>
                        <img class="my-5" src="img/user/buy.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">買うかどうか迷おう！</h5>
                        <p class="text-subTitle">
                            気に入ったら商品のネットショップへ行き買うかどうかを迷おう
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===item-user== --}}
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div>
                <h3 class="text-center text-title bg-main m-0 py-5"><u>商品を出品する</u></h3>
            </div>
            {{-- ===1=== --}}
            <div class="container-fluid py-5 bg-main d-flex flex-column flex-sm-row">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">1.First</h5>
                        <img class="my-5" src="img/item-user/register.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">商品を登録しよう！</h5>
                        <p class="text-subTitle">
                            手にとってみて欲しい商品を登録しよう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===2=== --}}
            <div class="container-fluid py-5 bg-second d-flex flex-column flex-sm-row-reverse">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">2.Second</h5>
                        <img class="my-5" src="img/item-user/search.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">お店を探そう！</h5>
                        <p class="text-subTitle">
                            どこのお店に置くかを考えお店を探そう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===3=== --}}
            <div class="container-fluid py-5 bg-main d-flex flex-column flex-sm-row">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">3.Third</h5>
                        <img class="my-5" src="img/item-user/send.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">応募してみよう！</h5>
                        <p class="text-subTitle">
                            置くお店が決まったら応募をしてお店の人にアポを取ろう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===4=== --}}
            <div class="container-fluid py-5 bg-second d-flex flex-column flex-sm-row-reverse">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">4.Fourth</h5>
                        <img class="my-5" src="img/item-user/share.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">シェアしよう！</h5>
                        <p class="text-subTitle">
                            ネットショップやSNSで置いてあるお店をシェアしよう！
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- ===store-owner=== --}}
        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
            <div>
                <h3 class="text-center text-title bg-main m-0 py-5"><u>お店のスペースを貸す</u></h3>
            </div>
            {{-- ===1=== --}}
            <div class="container-fluid py-5 bg-main d-flex flex-column flex-sm-row">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">1.First</h5>
                        <img class="my-5" src="img/store-owner/register.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">お店を登録しよう！</h5>
                        <p class="text-subTitle">
                            スペースを有効活用したいのならばまずは登録してみよう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===2=== --}}
            <div class="container-fluid py-5 bg-second d-flex flex-column flex-sm-row-reverse">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">2.Second</h5>
                        <img class="my-5" src="img/store-owner/search.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">商品を探そう！</h5>
                        <p class="text-subTitle">
                            お店に置いても良いと思える商品を探そう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===3=== --}}
            <div class="container-fluid py-5 bg-main d-flex flex-column flex-sm-row">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">3.Third</h5>
                        <img class="my-5" src="img/store-owner/apply.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">応募してみよう！</h5>
                        <p class="text-subTitle">
                            商品を出品している人にコンタクトを取ろう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===4=== --}}
            <div class="container-fluid py-5 bg-second d-flex flex-column flex-sm-row-reverse">
                <div class="col-sm-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">4.Fourth</h5>
                        <img class="my-5" src="img/store-owner/shop.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-sm-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">お店に商品を置こう！</h5>
                        <p class="text-subTitle">
                            お店に商品を置いてネットショップやSNSでお店を紹介してもらおう！
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="home_fature" class="container-fluid text-center py-5 shadow-lg bg-white">
    <h3 class="text-title">特徴</h3>
    <div class="d-flex flex-column flex-sm-row justify-content-around pt-5">
        <div class="col-sm-4 py-3 shadow rounded">
            <p class="text-subTitle pt-5">商品の実物を見れる</p>
            <img src="img/feature/shop.svg" height="200px" alt="">
        </div>
        <div class="col-sm-4 py-3 shadow rounded">
            <p class="text-subTitle pt-5">実物を見れるのに、ネットショップで買える</p>
            <img  src="img/feature/watch.svg" height="200px" alt="">
        </div>
    </div>
</div>

@endsection