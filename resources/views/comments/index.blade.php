{{-- @extends('layouts.app')

@section('content') --}}

 <div class="chat-container mx-auto pt-5 col-10">
    <div class="chat-area">
        <div class="card">
            {{-- <div class="card-header">Comment</div> --}}
            <div class="card-body chat-card"> 
                <div id="comment-first"></div>                                                 

                <div class="overview" style="overflow:auto;" id="auto_scroll">  
                    <div style="height: 350px;" id="comment-data">                                        
                    </div>
                </div>  

            </div>
        </div>
    </div>
</div>

{{-- statu --}}
<div class="status-container py-2">    
    <div class="row col-10 mx-auto">
        {{-- accept --}}
        <div class="col-4">
            <form class="text-center" method="POST" action="{{ route('applications.update') }}">
                {{-- @method('PATCH') --}}
                @csrf
                <input name="application_id" type="hidden" value="{{ $application->id }}">
                <input name="status" type="hidden" value="accept">
                @if ($application->applicaiton_status == "accept")
                    <button class="btn bg-point p-3" type="submit">承諾する</button>                        
                @else
                    <button class="btn p-3" type="submit">承諾する</button>
                @endif                
            </form>
            <hr class="bg-point">
        </div>        
        {{-- onboarding --}}
        <div class="col-4">
            <form class="text-center" method="POST" action="{{ route('applications.update') }}">
                {{-- @method('PATCH') --}}
                @csrf
                <input name="application_id" type="hidden" value="{{ $application->id }}">
                <input name="status" type="hidden" value="onboard">
                @if ($application->applicaiton_status == "onboard")
                <button class="btn bg-point p-3" type="submit">検討中</button>
                @else
                    <button class="btn p-3" type="submit">検討中</button>
                @endif
            </form>
            <hr class="bg-point">
        </div>
        {{-- reject --}}
        <div class="col-4">
            <form class="text-center" method="POST" action="{{ route('applications.update') }}">
                {{-- @method('PATCH') --}}
                @csrf
                <input name="application_id" type="hidden" value="{{ $application->id }}">
                <input name="status" type="hidden" value="reject">
                @if ($application->applicaiton_status == "reject")
                    <button class="btn bg-point py-3" type="submit">丁重に断る</button>
                @else
                    <button class="btn p-3" type="submit">丁重に断る</button>
                @endif
            </form>
            <hr class="bg-point">
        </div>              
    </div>
</div>

<div class="comment-container">    
    <form class="row col-10 mx-auto" method="POST" action="{{ route('comments.store') }}">                        
        @csrf
        <input name="application" type="hidden" value="{{$application}}">
        <input name="application_id" type="hidden" value="{{$application->id}}">

        @if(isset($application->from_user_id))
        <input name="user_id" type="hidden" value="{{$application->from_user_id}}">
        @endif
        
        @if(isset($application->from_store_owner_id))
        <input name="store_owner_id" type="hidden" value="{{$application->from_store_owner_id}}">
        @endif

        @if(isset($application->to_user_id))
        <input name="user_id" type="hidden" value="{{$application->to_user_id}}">
        @endif

        @if(isset($application->to_store_owner_id))
        <input name="store_owner_id" type="hidden" value="{{$application->to_store_owner_id}}">
        @endif

        {{-- <textarea class="col-10 p-3" name="content" placeholder="command + Enter" class="form-control" placeholder="input massage" aria-label="With textarea" onkeydown="if(event.metaKey&&event.keyCode==13){document.getElementById('submit').click();return false};" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"></textarea>
        <button class="col-2 btn bg-point" id="submit" type="input-group-prepend button"><i class="fas fa-3x fa-paper-plane text-second"></i></button> --}}
        <div class="input-group mb-3">
            {{-- <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"> --}}
            <textarea style="height: 100px" class="col-10 p-3" name="content" placeholder="command + Enter" class="form-control" placeholder="input massage" aria-label="With textarea" onkeydown="if(event.metaKey&&event.keyCode==13){document.getElementById('submit').click();return false};" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"></textarea>
            <button class="btn btn-outline-secondary col-2" id="submit" type="input-group-prepend button"><i class="fas fa-3x fa-paper-plane text-point"></i></button>
          </div>
</form>    
</div>

{{-- @endsection --}}

@section('js')
    <script src="{{ mix('/js/comment.js') }}"></script>
    <script src="{{ mix('/js/scroll.js') }}"></script>
@endsection
