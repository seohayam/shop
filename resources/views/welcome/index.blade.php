@extends('layouts.app')

@section('content')

<div id="top">
    <img src="img/top.png" alt="">
</div>

{{-- 説明・誘導 --}}
<div id="explain">
    
    <div class="container-fluid border-bottom bg-second py-5 pl-5">

        <div class="contaienr">            
            @if(Auth::guard('store_owner')->check())
                <h1>商品を探そう</h1>
                <p>新しい商品をお店に体幹しに行こう！</p>
            @else
                <h1>お店を探そう</h1>
                <p>新しいお店を探して自分の商品を広めよう</p>
            @endif

            <div class="row d-flex jsutify-content-left">
                <div class="text-center mr-3">
                    @if(Auth::guard('store_owner')->check())
                        <a class="btn bg-main" href="{{ route('stores.create', ['store_owner' => Auth::guard('store_owner')->user()->id]) }}">+　店舗情報を登録</a>
                    @elseif(Auth::check())
                        <a class="btn bg-main" href="{{ route('items.create', ['user' => Auth::user()->id]) }}">+　商品を登録</a>                    
                    @endif
                </div>        
                <div class="text-center">
                    <a class="btn bg-point" href="">手順を確認する</a>
                </div>                
            </div>                       
        </div>


    </div>

</div>

{{-- ナビ --}}
<div id="tab" class="contaienr-fluid py-5 bg-second">

    <nav>
        <div class="nav nav-tabs d-flex justify-content-around" id="nav-tab" role="tablist">
            <a class="nav-link active rounded rounded-circle bg-second p-5" id="nav-home-tab" data-toggle="tab" href="#items" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-shopping-cart fa-3x"></i></a>
            <a class=" nav-link rounded rounded-circle bg-second p-5" id="nav-profile-tab" data-toggle="tab" href="#stores" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-store-alt fa-3x"></i></a>      
        </div>
    </nav>

</div>

{{-- カード --}}
<div id="item" class="container-fluid">

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="items" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="w-100 d-flex flex-wrap">
                @foreach ($items as $item)
                    <div role="card" class="col-3 p-0 item-card m-5">
                        <a href="{{ route('welcome.showItem', $item) }}">
                            {{-- <img src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-2.jpg" class="img img-responsive"> --}}
                            <img src="img/1.jpg" class="img img-responsive">                            
                            <div class="item-card-name">{{$item->title}}</div>
                            <div class="item-card-username">ユーザー名：{{$item->user->name}}</div>
                            {{-- <div class="item-card-icons"><a href="#"><i class="fab fa-facebook"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></div> --}}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="stores" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="w-100 d-flex flex-wrap">
                @foreach ($stores as $store)
                    <div role="card" class="col-3 p-0 item-card m-5">
                        <a href="{{ route('welcome.showStore', $store) }}">
                            {{-- <img src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-2.jpg" class="img img-responsive"> --}}
                            <img src="img/1.jpg" class="img img-responsive">
                            <div class="item-card-name">{{$store->name}}</div>
                            <div class="item-card-username">ユーザー名：{{$store->storeOwner->name}}</div>
                            {{-- <div class="item-card-icons"><a href="#"><i class="fab fa-facebook"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></div> --}}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

@endsection