{{-- itemの場合 --}}

<div class="card border-0 rounded-0" style="width: 18rem;">
    {{-- <img src="{{$application->item->image_path}}" class="card-img-top" alt="..."> --}}
    @isset($item->image_path)
        <img class="img img-responsive" alt="" height="200" src="{{ $item->image_path }}">
    @else
        <img class="img img-responsive" alt="" height="200" src="{{ asset('/img/1.jpg') }}">                                        
    @endisset   
    <div class="p-3">
      <p class="text-secondary">{{$application->created_at->format('Y m/d')}}</p>
      <h5 class="">
        @if(isset($application->fromUser))
            ユーザー：{{$application->fromUser->name}}
        @endif
        
        @if(isset($application->fromStoreOwner))
            ストアオーナー：{{$application->fromStoreOwner->name}}
        @endif  
      </h5>

      <div class="col-12">
        <div class="row d-flex justify-content-between align-items-center">
            <div>
                <p class="card-text text-secondary">{{$application->item->title}}</p>
            </div>
            <div>
                <a href="#"><i class="fas fa-2x fa-arrow-circle-right"></i></a>
            </div>
        </div>
      </div>

    </div>
</div>

    <div class="card">
        <div class="card-body">            
            {{-- @if(isset($application->item))             --}}
                <h5 class="card-title">{{$application->item->title}}</h5>
                <a class="btn bg-main" href="{{ route('welcome.showItem', ['item' => $application->item_id]) }}">            
                    詳細
                </a>       
            {{-- @if(isset($application->store)) --}}
                <h5 class="card-title">{{$application->store->name}}</h5>  
                <a class="btn bg-main" href="{{ route('welcome.showStore', ['store' => $application->store_id]) }}">            
                    詳細
                </a>       
                <a href="{{ route('applications.show', ['application' => $application]) }}" class="btn bg-main">
                    チャットする
                </a> 
            {{-- @endif --}}

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