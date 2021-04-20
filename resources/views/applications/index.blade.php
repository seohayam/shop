@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="bg-point mx-auto col-8">
        <h1>applications</h1>
        @if(isset($applications))

            @foreach($applications as $application)  
                <div class="my-3 mx-auto">
                    @include('components.cardApplication', ['application' => $application])                
                </div>
            @endforeach
    
        @endif        
    </div>
    
</div>

@endsection