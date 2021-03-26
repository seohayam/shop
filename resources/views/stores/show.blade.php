@extends('layouts.app')

@section('content')
<h1>store show</h1>

<a href="{{ route('stores.edit', $store) }}">編集する</a>
<h1>{{$store->name}}</h1>


@endsection