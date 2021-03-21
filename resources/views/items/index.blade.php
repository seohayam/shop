@extends('layouts.app')

@section('content')

<h1>item　一覧</h1>

@foreach ($items as $item)
<button><a href="{{route('items.show', $item)}}">{{$item->id}}</a></button>
<img style="width:100px; height:100px;" src="img/1.jpg" alt="">
<h1>{{$item->title}}</h1>
<h1>{{$item->user->name}}</h1>
    
@endforeach
    
@endsection