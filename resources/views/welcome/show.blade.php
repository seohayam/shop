@extends('layouts.app')

@section('content')
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
<div class="contaienr-fluid  d-flex justify-content-md-end py-5">
    <div class="w-75  d-flex justify-content-center">
        <img class="card show-img w-50" alt="" src="{{ asset('/img/1.jpg') }}">
    </div>
</div>
{{-- card --}}
<div class="contaienr-fluid d-flex justify-content-md-end pb-5">
    <div class="card w-75">
        <div class="card-body bg-second">
            <div class="contaienr p-5">
                <h5 class="text-title text-capitalize pb-3">{{$item->title}}</h5>
                <p class="text-text text-truncate">紹介：{{$item->description}}</p>
                <p class="text-text text-truncate">値段：{{$item->value}}</p>
                <div class="container d-flex justify-content-around pt-5">
                    <a href="{{$item->url}}" class="w-25 h-25 btn bg-main">ネットショップを見る</a>
                                                            
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
<div class="contaienr-fluid  d-flex justify-content-md-end py-5">
    <div class="w-75  d-flex justify-content-center">
        <img class="card show-img w-50" alt="" src="{{ asset('/img/1.jpg') }}">
    </div>
</div>
{{-- card --}}
<div class="contaienr-fluid d-flex justify-content-end">
    <div class="card w-75">
        <div class="card-body bg-point">
            <div class="contaienr p-5">
                <h5 class="text-title text-capitalize pb-3 text-second">{{$store->name}}</h5>
                <p class="text-text text-truncate text-second">紹介：{{$store->description}}</p>
                {{-- <p class="text-text text-truncate">値段：{{$store->value}}</p> --}}
                <div class="container d-flex justify-content-around pt-5"> 

                    <a class="w-25 h-25 btn bg-second cursor" data-toggle="collapse" href="#map" role="button" aria-expanded="false" aria-controls="map">マップで確認する</a>
                    
                    @if (Auth::check() && $userItemNum != 0)
                        <form class="w-25" method="POST" action="{{ route('applications.store',['user' => Auth::id()])}}">
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
                        {{-- <a href="{{ route('applications.store', ['store' => $store]) }}" class="w-25 btn bg-point">応募する</a>                                             --}}
                    @elseif(Auth::check() && $userItemNum == 0)
                        <div class="w-25 p-0">
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
<div id="map" class="collapse">
    <div class="container-fluid d-flex justify-content-end p-0">
        <div class="w-75">
            @if (isset($store->adress))
                <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key={{ config("services.google-map.apikey") }}&q={{$store->adress}}' width='100%' height='700' frameborder='0'></iframe>
            @endif
        </div>
    </div>
</div>

{{-- relationship --}}
<div class="container-fluid text-center py-5">
    @if(isset($item))
        <h1>この商品があるお店</h1>
    @elseif(isset($store))
        <h1>この店に置いてある商品</h1>
    @endif
</div>

<div class="container-fluid d-flex justify-content-center py-5">
    <div class="row item-card-container">
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
    {{-- <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCC05dInZBrIvVs5I4iAzTdGOqT2TExrEY&callback=initMap" async defer></script> --}}
@endsection