@extends('layouts.app')

@section('content')

{{-- img --}}
<div class="contaienr-fluid py-5">
  <div class="col-7 col-sm-5 mx-auto">
      <img class="card show-img" alt="" src="{{ $item->image_path }}">
  </div>
</div>
{{-- card --}}
<div class="contaienr-fluid mx-auto col-sm-10 pb-5">
  <div class="card">
      <div class="card-body bg-second">       
          <div class="contaienr p-5">
              <h5 class="text-title text-capitalize pb-3">{{$item->title}}</h5>          
              <p class="text-text text-truncate">紹介：{{$item->description}}</p>
              <p class="text-text text-truncate">値段：{{$item->value}}</p>
              <hr class="bg-point">
              <div class="container d-flex justify-content-around pt-5">
                  {{-- <a href="{{$item->url}}" class="w-25 btn bg-main">ネットショップへ遷移する</a>    --}}
                  <div class="d-flex align-items-center">
                    <a class="" href="{{ route('items.index', ['user' => Auth::id()] ) }}"><i class="fas fa-2x fa-user-edit"></i></a>  
                  </div>
                  <div class="d-flex align-items-center">
                    {{$item->id}}
                    <a class="" href="{{ route('items.edit', ['id' => $item->id, 'user' => Auth::id(), 'item' => $item->id]) }}"><i class="fas fa-2x fa-edit"></i></a>                                                            
                  </div>
                  <div class="d-flex align-items-center">
                    <form action="{{ route('items.destroy', ['user' => Auth::id(), 'item' => $item] ) }}" method="POST">
                      @method('DELETE')
                      @csrf                    
                      <input class="fas fa-2x btn btn-main" type="submit" value="&#xf2ed">                                    
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection