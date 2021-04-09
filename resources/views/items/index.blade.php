@extends('layouts.app')

@section('content')
{{-- プロフィール --}}
<ul class="nav nav-pills mb-3 d-flex justify-content-around pt-5" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active text-point" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">アカウント</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-point" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">投稿商品一覧</a>      
    </li>   
    <li class="nav-item">
      <a class="nav-link text-point" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">チャット</a>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link text-point" href="{{ route('items.create', ['user' => Auth::id()]) }}"><i class="far fa-2x fa-plus-square"></i></a>
    </li>
  </ul>

  <div class="tab-content" id="pills-tabContent">
    {{-- tab1 --}}
    <div class="tab-pane fade show active py-5" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">     

            <div class="contaienr-fluid d-flex justify-content-md-end pb-5">
                <div class="mx-auto d-flex align-items-center">
                    {{-- <img src="" alt=""> --}}
                    <i class="far fa-5x fa-user-circle"></i>
                </div>
                <div class="card w-75">
                    <div class="card-body bg-second">       
                        <div class="contaienr p-5">
                            <div class="container">                                
                                <h5 class="text-title text-capitalize pb-3">{{$user->name}}</h5>          
                                <p class="text-text text-truncate">メール：{{$user->email}}</p> 
                            </div>                           
                            <hr class="bg-point">                            
                            <div class="container d-flex justify-content-around pt-5">
                                <div class="contaienr">
                                    <p>投稿した商品数</p>
                                    <p class="text-center">{{$itemMax}}</p>
                                </div>
                                <div class="contaienr">
                                    <p>応募したお店の数</p>
                                    <p class="text-center">?</p>
                                </div>
                                <div class="contaienr">
                                    <p>オファーを受けた数</p>
                                    <p class="text-center">?</p>
                                </div>
                                {{-- <a href="{{$item->url}}" class="w-25 btn bg-main">ネットショップへ遷移する</a>    --}}
                                {{-- <a class="" href="{{ route('items.index', ['user' => Auth::id()] ) }}"><i class="fas fa-2x fa-user-edit"></i></a>                                --}}
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
                    <div class="container d-flex flex-wrap">
                        @foreach ($items as $item)
                            <div role="card" class="col-3 p-0 item-card m-5">
                                <a href="{{ route('items.show', ['user' => Auth::id(), 'item' => $item]) }}">
                                    {{-- <img src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-2.jpg" class="img img-responsive"> --}}
                                    <img class="img img-responsive" alt="" src="{{ asset('/img/1.jpg') }}">
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

  @endsection