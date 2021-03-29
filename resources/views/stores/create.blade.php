@extends('layouts.app')

@section('content')
<h1>store create</h1>


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

<form method="POST" action="{{route('stores.store')}}" enctype="multipart/form-data">
    @csrf        

    <input name="name" type="text" placeholder="name" value="{{ old('name') }}">
    <input name="adress" type="text" placeholder="adress" value="{{ old('value') }}">
    <input name="available" type="text" placeholder="available" value="{{ old('available') }}">
    <input name="store_url" type="text" placeholder="store_url" value="{{ old('store_url') }}">        

    <textarea name="description" id="" cols="30" rows="10" placeholder="description">{{old('description')}}</textarea>
    
    <input type="submit" name="" id="" value="更新">
</form>

@endsection