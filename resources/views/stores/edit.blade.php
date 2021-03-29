@extends('layouts.app')

@section('content')
<h1>store edit</h1>
{{$store->store_owner_id}}

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

<form method="POST" action="{{route('stores.update', $store)}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf        

    <input name="name" type="text" placeholder="name" value="{{ old('name', $store->name) }}">
    <input name="adress" type="text" placeholder="adress" value="{{ old('value', $store->adress) }}">
    <input name="available" type="text" placeholder="available" value="{{ old('available', $store->available) }}">
    <input name="store_url" type="text" placeholder="store_url" value="{{ old('store_url', $store->store_url) }}">        

    <textarea name="description" id="" cols="30" rows="10" placeholder="description">{{old('description', $store->description)}}</textarea>
    
    <input type="submit" name="" id="" value="更新">
</form>



@endsection

