@extends('layouts.app')

@section('content')

<div id="top">
    <img src="img/top.png" alt="">
</div>

<div id="explain">
    
    <div class="container-fluid border-bottom bg-second py-5">

        <div class="contaienr ml-5">

            <div class="mb-5">
                <h1>商品を探そう</h1>
                <p>新しい商品をお店に体幹しに行こう！</p>
            </div>

            <div class="row">
                <div class="text-center mx-3">
                    <a class="btn bg-main" href="">+　店舗情報を登録</a>
                </div>        
                <div class="text-center mx-3">
                    <a class="btn bg-point" href="">手順を確認する</a>
                </div>
        
            </div>

        </div>


    </div>

    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-6 text-center">
                <a href=""><i class="fas fa-shopping-cart fa-5x rounded rounded-circle bg-second p-5"></i></a>
            </div>        
            <div class="col-6 text-center">
                <a href=""><i class="fas fa-store-alt fa-5x rounded rounded-circle bg-second p-5"></i></a>
            </div>
        </div>
    </div>

</div>




<div id="item" class="container-fluid">

        <div class="d-flex flex-wrap"> 

@foreach ($items as $item)

                <div role="card" class="col-3 p-0 item-card m-5">
                    <a href="{{ route('items.show', $item) }}">
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

@endsection