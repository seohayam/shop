@extends('layouts.app')

@section('content')

@if($itemMax == 0 || session('error'))
<div class="container-fluid d-flex justify-content-end p-0 m-0">
    <div class="col-10 col-sm-3 p-0 py-3 m-0">
        @if($itemMax == 0)
            <div class="toast bg-danger m-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    商品を登録してみよう
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        @if (session('error'))
        <div class="toast bg-warning d-flex justify-content-between align-items-center p-2 my-2" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
            <div>
                <strong class="mr-auto">{{ session('error') }}</strong>
            </div>
            <div>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
    </div>
</div>
@endif

{{-- プロフィール --}}
  <ul class="nav nav-pills mb-3 d-flex justify-content-around pt-5" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active text-point" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
            アカウント
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-point" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
            投稿商品一覧
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-point" href="{{ route('applications.index') }}">
            チャット
        </a>
    </li>
    {{-- <li class="nav-item text-center">
        <a class="nav-link text-point" href="{{ route('items.create', ['user' => Auth::id()]) }}"><i class="far fa-2x fa-plus-square"></i></a>
    </li> --}}
  </ul>

  <div class="tab-content" id="pills-tabContent">
    {{-- tab1 --}}
    <div class="tab-pane fade show active py-5" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">     

            <div class="contaienr-fluid d-flex flex-column flex-sm-row align-items-center pb-5">
                <div class="mx-auto d-flex align-items-center mb-5">
                    <i class="far fa-5x fa-user-circle"></i>
                </div>
                <div class="card col-sm-10 p-0">
                    <div class="card-body bg-second">       
                        <div class="py-2">
                            <div class="container">                                
                                <h5 class="text-title text-capitalize pb-3">{{$user->name}}</h5>          
                                <p class="text-text text-truncate">メール：{{$user->email}}</p> 
                            </div>                           
                            <hr class="bg-point">                            
                            <div class="container d-flex justify-content-around pt-sm-5">
                                <div class="contaienr">
                                    <p>投稿</p>
                                    <p class="text-center">{{$itemMax}}</p>
                                </div>
                                <div class="contaienr">
                                    <p>応募</p>
                                    <p class="text-center">{{$fromUserApplicationNum}}</p>
                                </div>
                                <div class="contaienr">
                                    <p>オファー</p>                                    
                                    <p class="text-center">{{$fromStoreOwnerApplicationNum}}</p>
                                </div>
                            </div>
                            <hr class="bg-point">                            
                            <div class="text-center">
                                <a class="btn bg-main" href="{{ route('items.create', ['user' => Auth::id()]) }}">アイテムを追加する</a>
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
                        @foreach ($items as $item)
                            <div role="card" class="col-sm-3 p-0 item-card">
                                <a href="{{ route('items.show', ['user' => Auth::id(), 'item' => $item]) }}">
                                    @isset($item->image_path)
                                        <img height="200px" class="img img-responsive" alt="" src="{{ $item->image_path }}">
                                    @else
                                        <img height="200px" class="img img-responsive" alt="" src="https://res.cloudinary.com/delvmfnei/image/upload/v1621186998/1_eihryo.jpg">                                        
                                    @endisset
                                    <div class="item-card-name">{{$item->title}}</div>
                                    <div class="item-card-username">ユーザー名：{{$item->user->name}}</div>
                                    {{-- <div class="item-card-icons"><a href="#"><i class="fab fa-facebook"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></div> --}}
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

@section('js')
    <script src="{{ mix('/js/toast.js') }}"></script>
@endsection
