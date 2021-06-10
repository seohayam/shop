@extends('layouts.app')

@section('content')

{{-- プロフィール --}}
<ul class="nav nav-pills mb-3 d-flex justify-content-around pt-5" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active text-point" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">アカウント</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-point" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">お店詳細</a>      
    </li>
    <li class="nav-item">
        <a class="nav-link text-point" href="{{ route('applications.index', ['store_owner' => Auth::guard('store_owner')->id()]) }}">チャット</a>      
    </li>
    @if($storeMax == 0)
    <li class="nav-item text-center">
        <a class="nav-link text-point" href="{{ route('stores.create', ['store_owner' => Auth::guard('store_owner')->id()]) }}"><i class="far fa-2x fa-plus-square"></i></a>
    </li>
    @endif
</ul>

<div class="tab-content" id="pills-tabContent">
    {{-- tab1 --}}
    <div class="tab-pane fade show active py-5" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">     

            <div class="contaienr-fluid d-flex flex-column flex-sm-row justify-content-md-end pb-5">
                <div class="mx-auto d-flex align-items-center mb-5">
                    {{-- <img src="" alt=""> --}}
                    <i class="far fa-5x fa-user-circle"></i>
                </div>
                <div class="card col-sm-10 p-0">
                    <div class="card-body bg-second">       
                        <div class="p-sm-5">
                            <div class="container">                                
                                <h5 class="text-title text-capitalize pb-3">{{$store_owner->name}}</h5>          
                                <p class="text-text text-truncate">メール：{{$store_owner->email}}</p> 
                            </div>                           
                            <hr class="bg-point">                            
                            <div class="container d-flex justify-content-around pt-5">
                                {{-- <div class="contaienr">
                                    <p>投稿した商品数</p>
                                    <p class="text-center">{{$storeMax}}</p>
                                </div> --}}
                                <div class="contaienr">
                                    <p>応募した商品の数</p>
                                    <p class="text-center">{{$fromStoreOwnerApplicationNum}}</p>
                                </div>
                                <div class="contaienr">
                                    <p>オファーを受けた数</p>
                                    <p class="text-center">{{$fromUserApplicationNum}}</p>
                                </div>
                                {{-- <a href="{{$item->url}}" class="w-25 btn bg-main">ネットショップへ遷移する</a>    --}}
                                {{-- <a class="" href="{{ route('stores.index', ['store_owner' => Auth::id()] ) }}"><i class="fas fa-2x fa-user-edit"></i></a>                                --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    {{-- tab2 --}}
    <div class="tab-pane fade py-5" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">                          
        <div id="item" class="container-fluid">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="items" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="container-fluid d-flex flex-column flex-sm-row flex-wrap justify-content-center align-items-center">
                        @foreach ($stores as $store)                        
                            <div role="card" class="col-sm-3 p-0 item-card m-sm-5">
                                <a href="{{ route('stores.show', ['store_owner' => Auth::id(), 'store' => $store]) }}">
                                    <img class="img img-responsive" alt="" src="https://res.cloudinary.com/delvmfnei/image/upload/v1621186998/1_eihryo.jpg">
                                    <div class="item-card-name">{{$store->title}}</div>
                                    <div class="item-card-username">ユーザー名：{{$store->storeOwner->name}}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>        
        </div>
    </div>
    {{-- tab3 --}}
    <div class="tab-pane fade py-5" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>

{{-- イイね --}}
<div class="d-flex flex-column flex-sm-row">

    <div class="like col-sm-5 mx-auto mb-5">
        <div class="text-center pb-5">
            <h3>イイね一覧（商品）</h3>
        </div>

        <div class="d-flex flex-olumn felx-sm-row flex-nowrap overflow-auto">
            @foreach($likeItems as $likeItem)
                <div role="card" class="col-auto item-card p-0 mx-2">
                    <a href="{{ route('welcome.showItem', optional($likeItem->item)->id) }}">
                        @isset(optional($likeItem->item)->image_path)
                            <img height="200px" class="img img-responsive" alt="" src="{{ optional($likeItem->item)->image_path }}">
                        @else
                            <img height="200px" class="img img-responsive" alt="" src="https://res.cloudinary.com/delvmfnei/image/upload/v1621186998/1_eihryo.jpg">                                        
                        @endisset
                        <div class="item-card-name">{{optional($likeItem->item)->title}}</div>
                        <div class="item-card-username">ユーザー名：{{optional(optional($likeItem->item)->user)->name}}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="like col-sm-5 mx-auto mb-5">
        <div class="text-center pb-5">
            <h3>イイね一覧（ストア）</h3>
        </div>
        <div class="d-flex flex-olumn felx-sm-row flex-nowrap overflow-auto">
            @foreach($likeStores as $likeStore)
            <div role="card" class="col-auto item-card p-0 mx-2">
                    <a href="{{ route('welcome.showStore', optional($likeStore->store)->id) }}">
                        @isset(optional($likeStore->store)->image_path)
                            <img height="200px" class="img img-responsive" alt="" src="{{ optional($likeStore->store)->image_path }}">
                        @else
                            <img height="200px" class="img img-responsive" alt="" src="https://res.cloudinary.com/delvmfnei/image/upload/v1621186998/1_eihryo.jpg">
                        @endisset
                        <div class="item-card-name">{{optional($likeStore->store)->title}}</div>
                        <div class="item-card-username">店舗名：{{optional($likeStore->store)->name}}</div>
                    </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection