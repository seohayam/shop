{{-- 素材コンテント --}}
{{-- ===1=== --}}
{{-- <div class="container-fluid row py-5">
    <div class="col-6 p-0">
        <div class="text-center">
            <h5 class="text-title">1.First</h5>
            <img class="my-5" src="img/user/search.svg" height="200px" alt="">
        </div>
    </div>
    <div class="col-6 flex-column d-flex justify-content-center align-items-center">
        <div class="w-75">
            <h5 class="text-title">欲しい物を見つけよう！</h5>
            <p class="text-subTitle">
                普段はネットショップでしか売られていない商品がお店に置いてあり、実際にとって試せる！欲しい商品を見つけて見に行ってみよう！
            </p>
        </div>
    </div>
</div> --}}
{{-- ===2=== --}}
{{-- <div class="container-fluid row py-5 bg-second">
    <div class="col-6 flex-column d-flex justify-content-center align-items-center">
        <div class="w-75">
            <h5 class="text-title">お店に行こう！</h5>
            <p class="text-subTitle">
                欲しいものが見つかったらお店に行って商品を実際にみよう！
            </p>
        </div>
    </div>
    <div class="col-6 p-0">
        <div class="text-center">
            <h5 class="text-title">2.Second</h5>
            <img class="my-5" src="img/user/go.svg" height="200px" alt="">
        </div>
    </div>
</div> --}}
{{-- ===3=== --}}
{{-- <div class="container-fluid row py-5">
    <div class="col-6 p-0">
        <div class="text-center">
            <h5 class="text-title">3.Third</h5>
            <img class="my-5" src="img/user/buy.svg" height="200px" alt="">
        </div>
    </div>
    <div class="col-6 flex-column d-flex justify-content-center align-items-center">
        <div class="w-75">
            <h5 class="text-title">買うかどうか迷おう！</h5>
            <p class="text-subTitle">
                気に入ったら商品のネットショップへ行き買うかどうかを迷おう
            </p>
        </div>
    </div>
</div> --}}

{{-- img

<img src="img/feature/shop.svg" height="200px" alt="">
 --}}

{{-- タブできり変えよう！

data-toggle="tab"
id=
href=
~~~~~~~~~
id
aria-labelledby
class="tab-pane fade" or class="tab-pane fade show active" --}}

@extends('layouts.app')

@section('content')

<div id="home_top"></div>

<div id="home_content" class="contaienr-fluid">
    {{-- ナビ --}}
    <ul class="nav nav-tabs w-100 row text-center m-0 shadow" id="myTab" role="tablist">
        <li class="nav-item col-4 bg-main d-flex justify-content-center align-items-center flex-column py-5">
            <h5 class="text-title m-0">商品を探す</h5>
            <img class="my-5" src="img/nav/search.svg" height="150px" alt="">
            <a class="col-6 btn bg-second active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">詳細</a>
        </li>
        <li class="nav-item col-4 bg-second d-flex justify-content-center align-items-center flex-column py-5">
            <h5 class="text-title m-0">商品を出品する</h5>
            <img class="my-5" src="img/nav/ship.svg" height="150px" alt="">
            <a class="col-6 btn bg-point" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">詳細</a>
        </li>
        <li class="nav-item col-4 bg-point d-flex justify-content-center align-items-center flex-column py-5">
            <h5 class="text-title m-0">お店のスペースを貸す</h5>
            <img class="my-5" src="img/nav/share.svg" height="150px" alt="">
            <a class="col-6 btn bg-second" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">詳細</a>
        </li>
    </ul>

    {{-- 内容 --}}
    <div class="tab-content">
        {{-- ===user=== --}}
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div>
                <h1 class="text-center pt-5 m-0"><u>商品を探す</u></h1>
            </div>
            {{-- ===1=== --}}
            <div class="container-fluid row py-5">
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">1.First</h5>
                        <img class="my-5" src="img/user/search.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">欲しい物を見つけよう！</h5>
                        <p class="text-subTitle">
                            普段はネットショップでしか売られていない商品がお店に置いてあり、実際にとって試せる！欲しい商品を見つけて見に行ってみよう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===2=== --}}
            <div class="container-fluid row py-5 bg-second">
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">お店に行こう！</h5>
                        <p class="text-subTitle">
                            欲しいものが見つかったらお店に行って商品を実際にみよう！
                        </p>
                    </div>
                </div>
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">2.Second</h5>
                        <img class="my-5" src="img/user/go.svg" height="200px" alt="">
                    </div>
                </div>
            </div>
            {{-- ===3=== --}}
            <div class="container-fluid row py-5">
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">3.Third</h5>
                        <img class="my-5" src="img/user/buy.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
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
                <h1 class="text-center pt-5 m-0"><u>商品を出品する</u></h1>
            </div>
            {{-- ===1=== --}}
            <div class="container-fluid row py-5">
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">1.First</h5>
                        <img class="my-5" src="img/item-user/register.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">商品を登録しよう！</h5>
                        <p class="text-subTitle">
                            普段はネットショップでしか売られていない商品がお店に置いてあり、実際にとって試せる！欲しい商品を見つけて見に行ってみよう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===2=== --}}
            <div class="container-fluid row py-5 bg-second">
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">お店を探そう！</h5>
                        <p class="text-subTitle">
                            欲しいものが見つかったらお店に行って商品を実際にみよう！
                        </p>
                    </div>
                </div>
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">2.Second</h5>
                        <img class="my-5" src="img/item-user/search.svg" height="200px" alt="">
                    </div>
                </div>
            </div>
            {{-- ===3=== --}}
            <div class="container-fluid row py-5">
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">3.Third</h5>
                        <img class="my-5" src="img/item-user/send.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">応募してみよう！</h5>
                        <p class="text-subTitle">
                            気に入ったら商品のネットショップへ行き買うかどうかを迷おう
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===4=== --}}
            <div class="container-fluid row py-5 bg-second">
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">シェアしよう！</h5>
                        <p class="text-subTitle">
                            欲しいものが見つかったらお店に行って商品を実際にみよう！
                        </p>
                    </div>
                </div>
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">4.Fourth</h5>
                        <img class="my-5" src="img/item-user/share.svg" height="200px" alt="">
                    </div>
                </div>
            </div>
        </div>
        {{-- ===store-owner=== --}}
        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
            <div>
                <h1 class="text-center pt-5 m-0"><u>お店のスペースを貸す</u></h1>
            </div>
            {{-- ===1=== --}}
            <div class="container-fluid row py-5">
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">1.First</h5>
                        <img class="my-5" src="img/store-owner/register.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">お店を登録しよう！</h5>
                        <p class="text-subTitle">
                            普段はネットショップでしか売られていない商品がお店に置いてあり、実際にとって試せる！欲しい商品を見つけて見に行ってみよう！
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===2=== --}}
            <div class="container-fluid row py-5 bg-second">
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">商品を探そう！</h5>
                        <p class="text-subTitle">
                            欲しいものが見つかったらお店に行って商品を実際にみよう！
                        </p>
                    </div>
                </div>
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">2.Second</h5>
                        <img class="my-5" src="img/store-owner/search.svg" height="200px" alt="">
                    </div>
                </div>
            </div>
            {{-- ===3=== --}}
            <div class="container-fluid row py-5">
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">3.Third</h5>
                        <img class="my-5" src="img/store-owner/apply.svg" height="200px" alt="">
                    </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">応募してみよう！</h5>
                        <p class="text-subTitle">
                            気に入ったら商品のネットショップへ行き買うかどうかを迷おう
                        </p>
                    </div>
                </div>
            </div>
            {{-- ===4=== --}}
            <div class="container-fluid row py-5 bg-second">
                <div class="col-6 flex-column d-flex justify-content-center align-items-center">
                    <div class="w-75">
                        <h5 class="text-title">実際にお店に置こう！</h5>
                        <p class="text-subTitle">
                            欲しいものが見つかったらお店に行って商品を実際にみよう！
                        </p>
                    </div>
                </div>
                <div class="col-6 p-0">
                    <div class="text-center">
                        <h5 class="text-title">4.Fourth</h5>
                        <img class="my-5" src="img/store-owner/shop.svg" height="200px" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div id="home_fature" class="container-fluid text-center py-5 shadow-lg bg-white">
    <h1>特徴</h1>
    <div class="row d-flex justify-content-around pt-5">
        <div class="col-4 py-3 shadow rounded">
            <p class="text-subTitle pt-5">商品の実物を見れる</p>
            <img src="img/feature/shop.svg" height="200px" alt="">
        </div>
        <div class="col-4 py-3 shadow rounded">
            <p class="text-subTitle pt-5">実物を見れるのに、ネットショップで買える</p>
            <img  src="img/feature/watch.svg" height="200px" alt="">
        </div>
    </div>
</div>

@endsection