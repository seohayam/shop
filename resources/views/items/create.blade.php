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

<div class="container-fluid py-5 d-flex justify-content-center">
    <h3 class="text-title">新しい商品を投稿しよう！</h3>
</div>
<div class="container-fluid pb-5 d-flex justify-content-center">
    <form class="col-md-6 d-flex flex-column" method="POST" action="{{route('items.store', ['user' => Auth::id()] )}}" enctype="multipart/form-data">        
        @csrf
        <label class="d-flex flex-column" for="image">image
            <input class="" name="image" type="file">
        </label>
        <label class="d-flex flex-column" for="title">title
            <input class="" name="title" type="text" placeholder="title" value="{{ old('title') }}">
        </label>
        <label class="d-flex flex-column" for="value">value
            <input class="" name="value" type="number" placeholder="value" value="{{ old('value') }}">
        </label>
        <label class="d-flex flex-column" for="url">url
            <input class="" name="item_url" type="text" placeholder="url" value="{{ old('item_url') }}">
        </label>
        <label class="d-flex flex-column" for="description">description
            <textarea class="" name="description" id="" placeholder="description">{{old('description')}}</textarea>
        </label>
        <input class="fas sumbmitInput" type="submit" name="" id="" value="新規投稿">
    </form>
</div>

@endsection