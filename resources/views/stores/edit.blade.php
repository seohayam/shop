@extends('layouts.app')

@section('content')
    @if(count($errors)>0)

        @error('name')
            <p>{{$message}}</p>
        @enderror

        @error('adress')
            <p>{{$message}}</p>
        @enderror

        @error('description')
            <p>{{$message}}</p>
        @enderror

        @error('imgae')
            <p>{{$message}}</p>
        @enderror

        @error('available')
            <p>{{$message}}</p>
        @enderror

        @error('store_url')
            <p>{{$message}}</p>
        @enderror

    @endif

    <div id="item" class="container-fluid d-flex justify-content-center">
        <div role="card" class="col-md-6 p-0 item-card m-5">        
            @if(isset($store->image_path))
            <img src="{{ $store->image_path }}" class="img img-responsive">
            @else
            <img src="https://res.cloudinary.com/delvmfnei/image/upload/v1621186998/1_eihryo.jpg" class="img img-responsive">
            @endif
            <div class="item-card-name">{{$store->name}}</div>
            {{-- <div class="item-card-icons"><a href="#"><i class="fab fa-facebook"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin"></i></a></div> --}}        
        </div>
    </div>


    <div class="container-fluid pb-5 d-flex justify-content-center">
        <form class="col-md-6 d-flex flex-column" method="POST" action="{{route('stores.update', ['store_owner' => Auth::guard('store_owner')->id(), 'store' => $store] )}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <label class="d-flex flex-column" for="image">image
                {{-- <input class="" name="title" type="file" placeholder="title"> --}}
            </label>
            <label class="d-flex flex-column" for="name">name
                <input class="" name="name" type="text" placeholder="name" value="{{ old('name', $store->name) }}">
            </label>
            <label class="d-flex flex-column" for="adress">adress
                <input class="" name="adress" type="text" placeholder="adress" value="{{ old('adress', $store->adress) }}">
            </label>
            <label class="d-flex flex-column" for="available">available
                <input class="" name="available" type="text" placeholder="available" value="{{ old('available', $store->available) }}">
            </label>
            <label class="d-flex flex-column" for="store_url">store_url
                <input class="" name="store_url" type="text" placeholder="store_url" value="{{ old('store_url', $store->store_url) }}">
            </label>
            <label class="d-flex flex-column" for="description">description
                <textarea class="" name="description" id="" placeholder="description">{{old('description', $store->description)}}</textarea>
            </label>
            <input class="fas sumbmitInput" type="submit" name="" id="" value="&#xf2ea">
        </form>
    </div>

@endsection

