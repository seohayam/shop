@extends('layouts.app')

@section('content')
<h1>編集</h1>

<h1>{{$item->id}}</h1>
<h1>{{$item->title}}</h1>
<h1>{{$item->description}}</h1>
<h1>{{$item->price}}</h1>
<a href="{{$item->item_url}}">item url</a>
<h1>{{$item->user->name}}</h1>


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

<form method="POST" action="{{route('items.update', ['user' => Auth::id(), 'item' => $item] )}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf        
    <input name="title" type="text" placeholder="title" value="{{ old('title', $item->title) }}">
    <input name="value" type="number" placeholder="value" value="{{ old('value', $item->value) }}">
    <input name="item_url" type="text" placeholder="url" value="{{ old('item_url', $item->item_url) }}">

    <textarea name="description" id="" cols="30" rows="10" placeholder="description">{{old('description', $item->description)}}</textarea>
    
    <input type="submit" name="" id="" value="更新">
</form>

@endsection