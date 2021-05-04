@extends('layouts.app')

@section('content')

<div class="container-fluid m-0 p-0 row">
        @if(isset($applications))
                <div class="col-4 bg-second p-0 m-0">
                    <div class="container-fluid text-center pt-3">
                        <h1>チャット</h1>
                    </div>
                    <div class="container-fluid">
                        <hr class="mx-5">
                    </div>
                    @foreach($applications as $application)
                        @include('components.columnApplication', ['application' => $application])
                    @endforeach
                </div>
                <div class="col-8 bg-second p-0">
                    <div class="text-center p-0 pt-3">
                        <h1>チャット相手の詳細</h1>
                    </div>
                    <div class="">
                        <hr class="">
                    </div>
                    <div class="row d-flex flex-wrap p-0 m-0">
                        @foreach($applications as $application)
                            @include('components.cardApplication', ['application' => $application])
                        @endforeach
                    </div>
                </div>
        @endif        
</div>

@endsection