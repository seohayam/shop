@extends('layouts.app')

@section('content')


<a href="{{ route('items.edit', $item) }}">編集</a>
<a href="{{ route('items.index') }}">TOP</a>

<form action="{{ route('items.destroy', $item) }}" method="POST">
  @method('DELETE')
  @csrf
  <input type="submit" value="削除">
</form>

<h1>item　詳細</h1>
<h1>{{$item->id}}</h1>
<h1>{{$item->title}}</h1>
<h1>{{$item->user->name}}</h1>

@endsection