@extends('layouts.app')

@section('content')

{{-- @foreach($comments as $comment)
{{$comment->content}}
@endforeach --}}

@foreach($applications as $application)

state:{{$application->applicaiton_status}}
date:{{$application->created_at}}
form:{{$application->user->name}}
to:{{$application->storeOwner->name}}

@endforeach


<div class="container-fluid row">

    <div class="col-4 bg-point">
        <h1>applications</h1>
    </div>

    <div class="col-8">
        <div class="chat-container">
            <div class="chat-area">
                <div class="card">
                    <div class="card-header">Comment</div>
                    <div class="card-body chat-card">
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                        @include('components.comment')
                    </div>
                </div>
            </div>
        </div>

        <div class="comment-container">
            <div class="input-group comment-area">
                <textarea class="form-control" placeholder="input massage" aria-label="With textarea"></textarea>
                <button type="input-group-prepend button" class="btn btn-outline-primary comment-btn">Submit</button>
            </div>
        </div>
    </div>

</div>

@endsection