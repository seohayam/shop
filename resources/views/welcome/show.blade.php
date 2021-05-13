@extends('layouts.app')

@section('content')
{{-- map --}}
@if(isset($store))
    <a id="map_btn" class="smooth-map border rounded-circle p-3 shadow-lg bg-white" data-toggle="collapse" href="#map" role="button" aria-expanded="false" aria-controls="map">
        <i class="fas fa-2x fa-map-marked-alt text-dark"></i>
    </a>
@endif

{{-- errors --}}
@if($errors->any())

<div class="container-fluid p-0">
    <div class="alert alert-warning alert-dismissible fade show w-100 m-0" role="alert">
        {{$errors->first()}}
        <a class="btn bg-second" href="{{ route('applications.show', ['application' => session('id')] ) }}">チャットへ</a>      
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

@endif

{{-- item --}}
@if (isset($item))
{{-- img --}}
<div class="contaienr-fluid py-5">
    <div class="col-10 col-sm-5  d-flex justify-content-center mx-auto">
        <img class="card show-img" alt="" src="{{ asset('/img/1.jpg') }}">
    </div>
</div>
{{-- card --}}
<div class="contaienr-fluid pb-5">
    <div class="card w-75 mx-auto">
        <div class="card-body bg-second">
            <div class="p-sm-5">
                <h5 class="text-title text-capitalize pb-3">{{$item->title}}</h5>
                <p class="text-text text-truncate">紹介：{{$item->description}}</p>
                <p class="text-text text-truncate">値段：{{$item->value}}</p>
                <div class="container d-flex justify-content-around pt-sm-5">
                    <a href="{{$item->url}}" class="btn bg-main">ネットショップを見る</a>
                                                            
                    @if (Auth::guard('store_owner')->check() && $storeNum != 0)
                        <form class="w-25 border rounded text-center bg-point" method="POST" action="{{ route('applications.store', ['store_owner' => Auth::id()])}}">
                            @csrf
                            <input name="itemId" type="hidden" value="{{ $item->id }}">
                            <input name="userId" type="hidden" value="{{$item->user->id}}">
                            <input class="btn bg-point" type="submit" value="応募する">
                        </form>
                    @elseif(Auth::guard('store_owner')->check() && $storeNum == 0)
                        <div class="p-0">
                            <div class="alert alert-warning alert-dismissible fade show w-100 m-0" role="alert">
                                <p class="m-0 text-subText">お店を登録すると応募ができます。</p>
                                <a class="btn bg-second my-2" href="{{ route('stores.create', ['store_owner' => Auth::guard('store_owner')->id()]) }}">お店を登録する</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- store --}}
@elseif(isset($store))
{{-- img --}}
<div class="contaienr-fluid py-5">
    <div class="col-10 col-sm-5  d-flex justify-content-center mx-auto">
        <img class="card show-img" alt="" src="{{ asset('/img/1.jpg') }}">
    </div>
</div>
{{-- card --}}
<div class="contaienr-fluid">
    <div class="card w-75 mx-auto">
        <div class="card-body bg-point">
            <div class="p-sm-5">
                <h5 class="text-title text-capitalize pb-3 text-second">{{$store->name}}</h5>
                <p class="text-text text-truncate text-second">紹介：{{$store->description}}</p>
                {{-- <p class="text-text text-truncate">値段：{{$store->value}}</p> --}}
                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-around pt-sm-5"> 

                    @if (Auth::check() && $userItemNum != 0)
                        <form class="col-sm-3 p-0" method="POST" action="{{ route('applications.store',['user' => Auth::id()])}}">
                            @csrf                            
                            <input name="storeId" type="hidden" value="{{$store->id}}">
                            <input name="storeOwnerId" type="hidden" value="{{$store->storeOwner->id}}">
                            <input class="btn bg-main w-100" type="submit" value="応募する">

                            <div class="">
                                <p class="m-0 text-subText">your marchendasie</p>
                            </div>
                            <select required name="userItemId" id="userItemSelect" class="custom-select custom-select-sm ">
                                @foreach ($userItems as $userItem)
                                <option value="{{$userItem->id}}">{{$userItem->title}}</option>
                                @endforeach
                            </select>
                        </form>
                    @elseif(Auth::check() && $userItemNum == 0)
                        <div class=" col-sm-3 p-0">
                            <div class="alert alert-warning alert-dismissible fade show w-100 m-0" role="alert">
                                <h5>応募する</h5>
                                <p class="m-0 text-subText">最低一つの商品投稿をしてください！</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endif

{{-- masp --}}
<div id="map" class="collapse my-5">
    <div class="container-fluid map-target p-0">
        <div class="col-sm-10 rounded　shadow-lg mx-auto p-0">
            @if (isset($store->adress))
                <iframe class="bg-point p-sm-3 my-sm-5 rounded" id='map' src='https://www.google.com/maps/embed/v1/place?key={{ config("services.google-map.apikey") }}&q={{$store->adress}}' width='100%' height='700' frameborder='0'></iframe>
            @endif
        </div>
    </div>
</div>

{{-- relationship --}}
<div class="container-fluid text-center pt-5">
    @if(isset($item))
        <h3 class="text-title">この商品があるお店</h3>
    @elseif(isset($store))
        <h3 class="text-title">この店に置いてある商品</h3>
    @endif
</div>

<div class="container-fluid p-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center item-card-container">
        @if(isset($applications))
            @foreach($applications as $application)
                @if(isset($item))

                    <div role="card" class="p-0 item-card">
                        <a href="{{ route('welcome.showItem', $application->store) }}">                                                        
                            @isset($application->store->image_path)
                                <img class="img img-responsive" alt="" height="200" src="{{ $application->store->image_path }}">
                            @else
                                <img class="img img-responsive" alt="" height="200" src="{{ asset('/img/1.jpg') }}">                                        
                            @endisset   
                            <div class="item-card-name">{{$application->store->title}}</div>
                            <div class="item-card-username">ユーザー名：{{$application->store->storeOwner->name}}</div>
                            {{-- <div class="item-card-icons"><a href="#"><i class="fab fa-facebook"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></div> --}}
                        </a>
                    </div>
                    
                @elseif(isset($store))

                    <div role="card" class="p-0 item-card">
                        <a href="{{ route('welcome.showItem', $application->item) }}">                                                        
                            @isset($application->item->image_path)
                                <img class="img img-responsive" alt="" height="200" src="{{ $application->item->image_path }}">
                            @else
                                <img class="img img-responsive" alt="" height="200" src="{{ asset('/img/1.jpg') }}">                                        
                            @endisset   
                            <div class="item-card-name">{{$application->item->title}}</div>
                            <div class="item-card-username">ユーザー名：{{$application->item->user->name}}</div>
                            {{-- <div class="item-card-icons"><a href="#"><i class="fab fa-facebook"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></div> --}}
                        </a>
                    </div>

                @endif
            @endforeach
        @endif
    </div>
</div>

@endsection

@section('js')
    <script src="{{ mix('/js/map.js') }}"></script>
    <script src="{{ mix('/js/smooth.js') }}"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCC05dInZBrIvVs5I4iAzTdGOqT2TExrEY&callback=initMap" async defer></script> --}}
@endsection