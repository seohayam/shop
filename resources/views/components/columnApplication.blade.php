<a class="text-dark text-decoration-none" href="{{ route('applications.show', ['application' => $application->id]) }}">
    <div class="app-card-chat-container container-fluid col-10 my-2 mx-auto p-3 row bg-main border border-light rounded">
        {{-- icon --}}
        <div class="col-2 bg-main d-flex align-items-center">
            @if(isset($application->fromUser) && Auth::check())
                <i class="fas fa-store-alt fa-2x"></i>
            @elseif(isset($application->fromUser) && Auth::guard('store_owner')->check())
                <i class="fas fa-user-circle fa-2x"></i>
            @endif

            @if(isset($application->fromStoreOwner) && Auth::check())
                <i class="fas fa-store-alt fa-2x"></i>
            @elseif(isset($application->fromStoreOwner) && Auth::guard('store_owner')->check())
                <i class="fas fa-user-circle fa-2x"></i>
            @endif
        </div>
        {{-- name and item --}}
        <div class="col-6 d-flex align-items-start justify-content-center flex-column bg-main">

            <h5 class="m-0 text-truncate">
                @if(isset($application->fromUser) && Auth::check())
                    {{$application->toStoreOwner->name}}
                @elseif(isset($application->fromUser) && Auth::guard('store_owner')->check())
                    {{$application->fromUser->name}}
                @endif

                @if(isset($application->fromStoreOwner) && Auth::check())
                    {{$application->fromStoreOwner->name}}
                @elseif(isset($application->fromStoreOwner) && Auth::guard('store_owner')->check())
                    {{$application->toUser->name}}
                @endif
            </h5>
            <p class="m-0 text-subText">ー {{$application->item->title}} ー</p>
        </div>
        {{-- state --}}
        <div class="col-2 bg-main d-flex justify-content-center align-items-center flex-column p-0">
            @if ($application->applicaiton_status == "onboard")
                <i class="far fa-comment-dots fa-2x text-point"></i>
                <p class="text-subText m-0 mt-1">ー 状況 ー</p>
            @elseif ($application->applicaiton_status == "accept")
                <i class="far fa-check-circle fa-2x text-success"></i>
                <p class="text-subText m-0 mt-1">ー 状況 ー</p>
            @elseif ($application->applicaiton_status == "reject")
                <i class="far fa-times-circle fa-2x text-danger"></i>
                <p class="text-subText m-0 mt-1">ー 状況 ー</p>
            @endif
        </div>

        {{-- date --}}
        <div class="col-2 bg-main d-flex justify-content-center align-items-center">
            <p class="text-subText m-0">{{$application->created_at->format('m/d')}}</p>
        </div>

    </div>
</a>