<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class StoreController extends Controller
{

    public function __construct(){
        
        $this->middleware('auth')->except(['index', 'show']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::with('storeOwner')->get();        

        return view('stores.index', ['stores' => $stores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        // $store->name = $request->name;
        // $store->adress = $request->adress;
        // $store->description = $request->description;
        // $store->available = $request->available;
        // $store->store_url = $request->store_url;
        // $store->updated_at = new DateTime();

        // $store->save();

        // return redirect()->route('stores.edit', $store);
        //$store->created_at = new DateTime();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('stores.show', ['store' => $store]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('stores.edit', ['store' => $store]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Store $store)
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

        return redirect()->route('stores.edit', $store);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
