{{-- @extends('layouts.app')

@section('content') --}}

<div class="chat-container">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card"> 
                <div id="comment-first"></div>                                 
                <div id="comment-data"></div>                 
            </div>
        </div>
    </div>
</div>

<div class="comment-container">
    <div class="input-group comment-area">
        <form method="POST" action="{{ route('comments.store') }}">                        
            @csrf
            <input name="from_user_id" type="hidden" value="{{$application->from_user_id}}">
            <input name="from_store_owner_id" type="hidden" value="{{$application->from_store_owner_id}}">
            <input name="to_user_id" type="hidden" value="{{$application->to_user_id}}">
            <input name="to_store_owner_id" type="hidden" value="{{$application->to_store_owner_id}}">

            <textarea name="content" placeholder="command + Enter" class="form-control" placeholder="input massage" aria-label="With textarea" onkeydown="if(event.metaKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <button id="submit" type="input-group-prepend button" class="btn btn-outline-primary comment-btn">Submit</button>
        </form>
    </div>
</div>

{{-- @endsection --}}

@section('js')
    <script src="{{ mix('/js/comment.js') }}"></script>
@endsection
