@extends('layouts.app')

@section('content')
<h1>store show</h1>

<a href="{{ route('stores.edit', ['store_owner' => Auth::id(), 'store' => $store]) }}">編集する</a>
<h1>{{$store->name}}</h1>

<form action="{{ route('stores.destroy', ['store_owner' => Auth::id(), 'store' => $store]) }}" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" value="削除">
  </form>


@endsection