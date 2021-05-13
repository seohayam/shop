@extends('layouts.app')

@section('content')

<div class="container-fluid m-0 p-0 d-flex flex-column flex-sm-row">
        @if(isset($applications))
                <div class="col-sm-4 bg-second p-0 m-0">
                    <div class="container-fluid text-left text-sm-center pt-3">
                        <h1 class="border-bottom border-dark pb-2">messages</h1>
                    </div>
                    @foreach($applications as $application)
                        @include('components.columnApplication', ['application' => $application])
                    @endforeach
                </div>
                <div class="col-sm-8 bg-second p-0 d-none d-sm-block">
                    <div class="text-center p-0 pt-3">
                        <h1 class="border-bottom border-dark pb-2">detail</h1>
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