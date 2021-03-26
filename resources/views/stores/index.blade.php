@extends('layouts.app')

@section('content')
<h1>store index</h1>

@foreach ($stores as $store)

<a href="{{ route('stores.show', $store) }}">
    <h1>{{ $store->name }}</h1>
    <h1>{{ $store->storeOwner->email }}</h1>
</a>
    
@endforeach


@endsection