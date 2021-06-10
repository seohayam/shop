@extends('layouts.app')

@section('content')

{{-- vue test --}}
{{-- <div class="test">
    @foreach ($items as $item)
    <like-component
    :post="{{json_encode($item)}}"
    :version="{{json_encode("item")}}"
    ></like-component>
    @endforeach
    @foreach ($stores as $store)
    <like-component
    :post="{{json_encode($store)}}"
    :version="{{json_encode("store")}}"
    ></like-component>
    @endforeach
</div> --}}

{{-- 説明・誘導 --}}
<div id="explain">

    <div class="bg-second d-flex justify-content-center pt-5">

        <div class="contaienr-fluid text-center">
            @if(Auth::guard('store_owner')->check())
                <h3 class="text-title">商品を探そう</h3>
                <p>新しい商品をお店に体幹しに行こう！</p>
            @else
                <h3 class="text-title">お店を探そう</h3>
                <p>新しいお店を探して自分の商品を広めよう</p>
            @endif

            @if(Auth::guard('store_owner')->check())
                <a class="btn bg-main" href="{{ route('stores.create', ['store_owner' => Auth::guard('store_owner')->user()->id]) }}">+　店舗情報を登録</a>
            @elseif(Auth::check())
                <a class="btn bg-main" href="{{ route('items.create', ['user' => Auth::user()->id]) }}">+　商品を登録</a>
            @endif
        </div>


    </div>

</div>

{{-- ナビ --}}
<div id="tab" class="contaienr-fluid py-5 bg-second">

    <nav>
        <div class="nav nav-tabs d-flex justify-content-around" id="nav-tab" role="tablist">
            @if(Auth::guard("user")->check())
                <a class="nav-link rounded rounded-circle bg-second p-3" id="nav-1" data-toggle="tab" href="#items" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-shopping-cart fa-2x"></i></a>
                <a class=" nav-link active rounded rounded-circle bg-second p-3" id="nav-profile-tab" data-toggle="tab" href="#stores" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-store-alt fa-2x"></i></a>      
            @elseif(Auth::guard('store_owner')->check())
                <a class="nav-link active rounded rounded-circle bg-second p-3" id="nav-home-tab" data-toggle="tab" href="#items" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-shopping-cart fa-2x"></i></a>
                <a class=" nav-link rounded rounded-circle bg-second p-3" id="nav-profile-tab" data-toggle="tab" href="#stores" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-store-alt fa-2x"></i></a>      
            @endif
        </div>
    </nav>

</div>

{{-- カード --}}
<div id="item" class="container-fluid p-0 p-5">

    <div class="tab-content" id="nav-tabContent">

        @if(Auth::guard("user")->check())
            <div class="tab-pane fade" id="items" role="tabpanel" aria-labelledby="nav-home-tab">
        @elseif(Auth::guard('store_owner')->check())
            <div class="tab-pane fade show active" id="items" role="tabpanel" aria-labelledby="nav-home-tab">
        @endif

            <div class="container-fluid d-flex justify-content-center">
                <div class="item-card-container d-flex row">
                    @foreach ($items as $item)
                        <div role="card" class="p-0 item-card">
                            <a href="{{ route('welcome.showItem', $item) }}">
                                @isset($item->image_path)
                                    <img class="img img-responsive" alt="" height="200" src="{{ $item->image_path }}">
                                @else
                                    <img class="img img-responsive" alt="" height="200" src="https://res.cloudinary.com/delvmfnei/image/upload/v1621186998/1_eihryo.jpg">
                                @endisset
                                <div class="item-card-name">{{$item->title}}</div>
                                <div class="item-card-username">ユーザー名：{{$item->user->name}}</div>
                                <div class="item-card-icons">
                                    <like-component
                                        :post="{{json_encode($item)}}"
                                        :version="{{json_encode("item")}}">
                                    </like-component>
                                </div>
                                {{-- <div class="item-card-icons"><a href="#"><i class="fab fa-facebook"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></div> --}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        @if(Auth::guard("user")->check())
            <div class="tab-pane fade show active" id="stores" role="tabpanel" aria-labelledby="nav-profile-tab">
        @elseif(Auth::guard('store_owner')->check())
            <div class="tab-pane fade" id="stores" role="tabpanel" aria-labelledby="nav-profile-tab">
        @endif

            <div class="container-fluid d-flex justify-content-center">
                <div class="item-card-container d-flex row">
                    @foreach ($stores as $store)
                        <div role="card" class="p-0 item-card">
                                <a href="{{ route('welcome.showStore', $store) }}">
                                @isset($store->image_path)
                                    <img class="img img-responsive" alt="" height="200" src="{{ $store->image_path }}">
                                @else
                                    <img class="img img-responsive" alt="" height="200" src="https://res.cloudinary.com/delvmfnei/image/upload/v1621186998/1_eihryo.jpg">
                                @endisset
                                <div class="item-card-name">{{$store->name}}</div>
                                <div class="item-card-username">ユーザー名：{{$store->storeOwner->name}}</div>
                                <div class="item-card-icons">
                                    <like-component
                                        :post="{{json_encode($store)}}"
                                        :version="{{json_encode("store")}}"
                                    ></like-component>
                                </div>
                                {{-- <div class="item-card-icons"><a href="#"><i class="fab fa-facebook"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></div> --}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</div>

@endsection