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

<div class="container-fluid py-5 d-flex justify-content-center">
    <h3 class="text-title">お店を掲載しよう！</h3>
</div>
<div class="container-fluid pb-5 d-flex justify-content-center">
    <form class="col-md-6 d-flex flex-column" method="POST" action="{{route('stores.store', ['store_owner' => Auth::id()] )}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <label class="d-flex flex-column" for="image">image
            {{-- <input class="" name="title" type="file" placeholder="title"> --}}
        </label>
        <label class="d-flex flex-column" for="title">title
            <input name="name" type="text" placeholder="name" value="{{ old('name') }}">
        </label>
        <label class="d-flex flex-column" for="value">value
            <input name="adress" type="text" placeholder="adress" value="{{ old('adress') }}">
        </label>
        <label class="d-flex flex-column" for="available">available
            <input name="available" type="text" placeholder="available" value="{{ old('available') }}">
        </label>
        <label class="d-flex flex-column" for="url">url
            <input name="store_url" type="text" placeholder="store_url" value="{{ old('store_url') }}">  
        </label>
        <label class="d-flex flex-column" for="description">description
            <textarea class="" name="description" id="" placeholder="description">{{old('description')}}</textarea>
        </label>
        <input class="fas sumbmitInput" type="submit" name="" id="" value="お店を掲載する">
    </form>
</div>

@endsection