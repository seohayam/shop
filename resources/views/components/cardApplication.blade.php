{{-- itemの場合 --}}
    <div class="card">
        <div class="card-body">
            @if(isset($application->item))
                <h5 class="card-title">{{$application->item->title}}</h5>  
                <a class="btn bg-main" href="{{ route('welcome.showItem', ['item' => $application->item_id]) }}">            
                    詳細
                </a>       
            @elseif(isset($application->store))
                <h5 class="card-title">{{$application->store->title}}</h5>  
                <a class="btn bg-main" href="{{ route('welcome.showStore', ['store' => $application->store_id]) }}">            
                    詳細
                </a>       
                <a href="{{ route('applications.show', ['application' => $application]) }}" class="btn bg-main">
                    チャットする
                </a> 
                {{-- <form method="POST" action="{{ route('comments.getData') }}">
                    @csrf
                    <input type="hidden" value="{{ $application->id }}">
                    <input type="submit" value="チャットする">
                    </form> --}}
            @endif

                @if ($application->applicaiton_status == "onboard")
                    <p class="bg-main rounded w-50 text-center">state:{{$application->applicaiton_status}}</p>
                @elseif ($application->applicaiton_status == "accept")
                    <p class="bg-point rounded w-50 text-center">state:{{$application->applicaiton_status}}</p>
                @elseif ($application->applicaiton_status == "reject")
                    <p class="bg-second rounded w-50 text-center">state:{{$application->applicaiton_status}}</p>
                @endif        
            
            <p class="card-text">date:{{$application->created_at}}</p>
                    
                    @if(isset($application->fromUser))
                        <p class="card-text">form:{{$application->fromUser->name}}</p>
                    @endif
                    
                    @if(isset($application->fromStoreOwner))
                        <p class="card-text">form:{{$application->fromStoreOwner->name}}</p>
                    @endif     
            
                    @if(isset($application->toUser))
                        <p class="card-text">to:{{$application->toUser->name}}</p>
                    @endif
            
                    @if(isset($application->toStoreOwner))
                        <p class="card-text">to:{{$application->toStoreOwner->name}}</p>
                    @endif
        </div>
    </div>

  {{-- storeの場合 --}}