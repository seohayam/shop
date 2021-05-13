@extends('layouts.app', ['authgroup' => 'store_owner'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Store Owner Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as StoreOwner!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
