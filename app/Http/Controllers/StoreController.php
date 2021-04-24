<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use App\StoreOwner;
use App\Application;

class StoreController extends Controller
{

    public function __construct(){
        
        $this->middleware('auth:store_owner');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storeId = Auth::guard('store_owner')->id();
        $stores = store::where('store_owner_id', $storeId)->with('storeOwner')->get();
        $storeMax = $stores->count();

        if($storeMax == 0){
            return redirect()->route('stores.create', ['store_owner' => Auth::guard('store_owner')->id()]);
        }

        $store_owner = StoreOwner::where('id', $storeId)->with('store')->first();        
        $fromStoreOwnerApplicationNum   = Application::where('from_store_owner_id', $storeId)->count();
        $fromUserApplicationNum         = Application::where('to_store_owner_id', $storeId )->count();

        return view('stores.index',['stores'=> $stores, 'store_owner' => $store_owner, 'storeMax' => $storeMax, 'fromStoreOwnerApplicationNum' => $fromStoreOwnerApplicationNum, 'fromUserApplicationNum' => $fromUserApplicationNum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $store = new Store();

        $store->name = $request->name;
        $store->adress = $request->adress;
        $store->description = $request->description;
        $store->available = $request->available;
        $store->store_url = $request->store_url;
        $store->created_at = new DateTime();

        dd($store);

        $store->save();

        return redirect()->route('stores.edit', ['store_owner' => Auth::id(), 'store' => $store]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StoreOwner $store_owner, Store $store)
    {
        return view('stores.show', ['store' => $store]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreOwner $store_owner, Store $store)
    {
        if(Auth::id() != $store->store_owner_id){
            return abort('403');
        }

        return view('stores.edit', ['store' => $store]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOwner $store_owner, StoreRequest $request, Store $store)
    {                

        if(Auth::id() != $store->store_owner_id){
            return abort('403');
        }

        $store->name = $request->name;
        $store->adress = $request->adress;
        $store->description = $request->description;
        $store->available = $request->available;
        $store->store_url = $request->store_url;
        $store->updated_at = new DateTime();

        $store->save();

        return redirect()->route('stores.edit', ['store_owner' => Auth::id(), 'store' => $store]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreOwner $store_owner, Store $store)
    {
        if(Auth::id() != $store->store_owner_id){
            return abort('403');            
        }                
            
        $store->delete();

        return redirect()->route('stores.index', ['store_owner' => Auth::id(), 'store' => $store]);
    }
}
