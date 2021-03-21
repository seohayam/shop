@extends('layouts.app')

@section('content')

<h1>item　詳細</h1>
<h1>{{$item->id}}</h1>
<h1>{{$item->title}}</h1>
<h1>{{$item->user->name}}</h1>
    
@endsection