@extends('layouts.app')

@section('content')

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
                    <a href="{{$item->url}}" class="w-25 btn bg-main">ネットショップを見る</a>
                                                            
                    @if (Auth::guard('store_owner')->check())
                        <form class="w-25 border rounded text-center bg-point" method="POST" action="{{ route('applications.store', ['store_owner' => Auth::id()])}}">
                            @csrf
                            <input name="item_id" type="hidden" value="{{ $item->id }}">
                            <input name="user_id" type="hidden" value="{{$item->user->id}}">
                            <input class="btn bg-point" type="submit" value="応募する">
                        </form>
                        {{-- <a href="{{ route('applications.store', ['store' => $store]) }}" class="w-25 btn bg-point">応募する</a>                                             --}}
                    @endif                   
                </div>
            </div>
        </div>
    </div>
</div>
    
@elseif(isset($store))
{{-- img --}}
<div class="contaienr-fluid  d-flex justify-content-md-end py-5">
    <div class="w-75  d-flex justify-content-center">
        <img class="card show-img w-50" alt="" src="{{ asset('/img/1.jpg') }}">
    </div>
</div>
{{-- card --}}
<div class="contaienr-fluid d-flex justify-content-end pb-5">
    <div class="card w-75">
        <div class="card-body bg-second">
            <div class="contaienr p-5">
                <h5 class="text-title text-capitalize pb-3">{{$store->name}}</h5>
                <p class="text-text text-truncate">紹介：{{$store->description}}</p>
                {{-- <p class="text-text text-truncate">値段：{{$store->value}}</p> --}}
                <div class="container d-flex justify-content-around pt-5">                    
                    <a href="{{$store->adress}}" class="w-25 btn bg-main">マップで確認する</a>
                                                            
                    @if (Auth::check())
                        <form class="w-25 border rounded text-center bg-point" method="POST" action="{{ route('applications.store',['user' => Auth::id()])}}">
                            @csrf                            
                            <input name="store_id" type="hidden" value="{{$store->id}}">
                            <input name="storeOwner_id" type="hidden" value="{{$store->storeOwner->id}}">
                            <input class="btn bg-point" type="submit" value="応募する">
                        </form>
                        {{-- <a href="{{ route('applications.store', ['store' => $store]) }}" class="w-25 btn bg-point">応募する</a>                                             --}}
                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endif

@endsection