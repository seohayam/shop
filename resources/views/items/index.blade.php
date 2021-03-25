@extends('layouts.app')

@section('content')

<h1>item　一覧</h1>
<a href="{{route('items.create')}}">追加</a>

@foreach ($items as $item)

<a href="{{route('items.show', $item->id)}}">
    <img style="width:100px; height:100px;" src="img/1.jpg" alt="">
    <h1>{{$item->title}}</h1>
    <h1>{{$item->user->name}}</h1>
</a>
@endforeach
    
@endsection