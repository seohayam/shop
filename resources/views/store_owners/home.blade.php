{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!store_owner
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.app')

@section('content')

<h1>store　一覧</h1>

<a href="{{ route('stores.create', ['store_owner' => Auth::id()] )}}">追加</a>

@foreach ($stores as $store)

<a href="{{ route('stores.show', ['store_owner' => Auth::id(), 'store' => $store->id] ) }}">
    <img style="width:100px; height:100px;" src="img/1.jpg" alt="">
    <h1>{{$store->title}}</h1>
    <h1>{{$store->storeOwner->name}}</h1>
</a>
@endforeach
    
@endsection