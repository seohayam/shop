<div class="col-4 app-card p-0 border">

    @if(Auth::check())
    <a class="text-dark text-decoration-none" href="{{ route('welcome.showStore', ['store' => $application->store->id]) }}">
    @elseif(Auth::guard('store_owner')->check())
    <a class="text-dark text-decoration-none" href="{{ route('welcome.showItem', ['item' => $application->item->id]) }}">
    @endif

        <div class="app-card-chat-container m-0 p-0 row bg-main">

            {{-- アイコン --}}
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

            {{-- 名前 and title --}}
            <div class="col-5 d-flex align-items-start justify-content-center flex-column bg-main">

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
             <div class="col-2 bg-main d-flex justify-content-center align-items-center">
                @if ($application->applicaiton_status == "onboard")
                    <i class="far fa-comment-dots fa-2x text-point"></i>
                @elseif ($application->applicaiton_status == "accept")
                    <i class="far fa-check-circle fa-2x text-success"></i>
                @elseif ($application->applicaiton_status == "reject")
                    <i class="far fa-times-circle fa-2x text-danger"></i>
                @endif
            </div>

            {{-- date --}}
            <div class="col-3 bg-main d-flex justify-content-center align-items-center">
                <p class="text-subText m-0">{{$application->created_at->format('m/d')}}</p>
            </div>

        </div>

        <div class="app-card-img bg-light">

            @if(Auth::guard('store_owner')->check())
                @if(isset($application->item->image_path))
                    <img class="" alt="" height="200" src="{{ $application->item->image_path }}">
                @else
                    <div style="height: 200px" class="d-flex justify-content-center align-items-center">
                        <i class="fa fa-images fa-5x"></i>
                    </div>
                @endif
            @endif

            @if(Auth::check())
                @if(isset($application->store->image_path))
                    <img class="" alt="" height="200" src="{{ $application->store->image_path }}">
                @else
                    <div style="height: 200px" class="d-flex justify-content-center align-items-center">
                        <i class="fa fa-images fa-5x"></i>
                    </div>
                @endif
            @endif
        </div>

    </a>

</div>