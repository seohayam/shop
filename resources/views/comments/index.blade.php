 <div class="chat-container mx-auto p-0 py-3 col-11 col-sm-10">
    <div class="chat-area">
        <div class="card">
            <div class="card-body chat-card p-0"> 
                <div id="comment-first"></div>                                                 

                <div class="overview container-fluid" style="overflow:auto;" id="auto_scroll">  
                    <div style="height: 450px;" id="comment-data">                                        
                    </div>
                </div>  

            </div>
        </div>
    </div>
</div>

{{-- statu --}}
@if(Auth::id() != $application->from_user_id || Auth::guard('store_owner')->id() != $application->from_store_owner_id)
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
                    <input class="fas fa-2x btn text-success border-dark p-3" type="submit" value="&#xf058　承認する">
                @else
                    <input class="fas fa-2x btn p-3" type="submit" value="&#xf058　承認する">
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
                    <input class="fas fa-2x btn p-3 text-dark border border-dark" type="submit" value="&#xf4ad　検討中">
                @else
                    <input class="fas fa-2x btn p-3" type="submit" value="&#xf4ad　検討中">
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
                    <input class="fas fa-2x btn text-danger border-dark p-3" type="submit" value="&#xf057　丁重に断る">
                @else
                    <input class="fas fa-2x btn p-3" type="submit" value="&#xf057　丁重に断る">
                @endif
            </form>
            <hr class="bg-point">
        </div>              
    </div>
</div>
@endif

<div class="comment-container">    
    <form class="row col-sm-10 mx-auto" method="POST" action="{{ route('comments.store') }}">                        
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

        <div class="input-group mb-3">
            <textarea style="height: 100px" class="col-10 p-3" name="content" placeholder="command + Enter" class="form-control" placeholder="input massage" aria-label="With textarea" onkeydown="if(event.metaKey&&event.keyCode==13){document.getElementById('submit').click();return false};" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"></textarea>
            <button class="btn btn-outline-secondary col-2" id="submit" type="input-group-prepend button"><i class="fas fa-2x fa-sm-3x fa-paper-plane text-point"></i></button>
          </div>
</form>    
</div>

@section('js')
    <script src="{{ mix('/js/comment.js') }}"></script>
    <script src="{{ mix('/js/scroll.js') }}"></script>
@endsection
