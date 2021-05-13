@extends('layouts.app')

@section('content')

@if(count($errors)>0)

    @error('title')
        <p>{{$message}}</p>
    @enderror

    @error('value')
        <p>{{$message}}</p>
    @enderror

    @error('item_url')
        <p>{{$message}}</p>
    @enderror

    @error('image')
        <p>{{$message}}</p>
    @enderror

    @error('description')
        <p>{{$message}}</p>
    @enderror

@endif

<div id="item" class="container-fluid d-flex justify-content-center">
    <div role="card" class="col-md-6 p-0 item-card m-5">        
        {{-- <img src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-2.jpg" class="img img-responsive"> --}}
        <img src="{{ asset('/img/1.jpg') }}" class="img img-responsive">
        <div class="item-card-name">{{$item->title}}</div>
        <div class="item-card-username">ユーザー名：{{$item->user->name}}</div>
        {{-- <div class="item-card-icons"><a href="#"><i class="fab fa-facebook"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></div> --}}        
    </div>
</div>


<div class="container-fluid pb-5 d-flex justify-content-center">
    <form class="col-md-6 d-flex flex-column" method="POST" action="{{route('items.update', ['user' => Auth::id(), 'item' => $item] )}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <label class="d-flex flex-column" for="image">image
            {{-- <input class="" name="title" type="file" placeholder="title"> --}}
        </label>
        <label class="d-flex flex-column" for="title">title
            <input class="" name="title" type="text" placeholder="title" value="{{ old('title', $item->title) }}">
        </label>
        <label class="d-flex flex-column" for="value">value
            <input class="" name="value" type="number" placeholder="value" value="{{ old('value', $item->value) }}">
        </label>
        <label class="d-flex flex-column" for="url">url
            <input class="" name="item_url" type="text" placeholder="url" value="{{ old('item_url', $item->item_url) }}">
        </label>
        <label class="d-flex flex-column" for="description">description
            <textarea class="" name="description" id="" placeholder="description">{{old('description', $item->description)}}</textarea>
        </label>
        <input class="fas sumbmitInput" type="submit" name="" id="" value="&#xf2ea">
    </form>
</div>

@endsection