@extends('layouts.app')

@section('content')

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
              <hr class="bg-point">
              <div class="container d-flex justify-content-around pt-5">
                  {{-- <a href="{{$item->url}}" class="w-25 btn bg-main">ネットショップへ遷移する</a>    --}}
                  <a class="w-25" href="{{ route('items.index', ['user' => Auth::id()] ) }}"><i class="fas fa-2x fa-user-edit"></i></a>  
                  <a class="w-25" href="{{ route('items.edit', ['user' => Auth::id(), 'item' => $item]) }}"><i class="fas fa-2x fa-edit"></i></a>                                                            
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
@endsection