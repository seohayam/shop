<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\ItemRequest;
use App\Item;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('user')->get();
        $stores = Store::with('storeOwner')->get();

        return view('welcome.index', ['items' => $items, 'stores' => $stores]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showItem($itemId)
    {
        $item = Item::where('id', $itemId)->first();
        $applications = Application::where('item_id', $itemId)->get();
        $storeId = Auth::guard('store_owner')->id();
        $storeNum = Store::where('store_owner_id', $storeId)->count();
        // dd($applications);
        // $store = Store::where('id', $store)->first();        

        return view('welcome.show', ['item' => $item, 'applications' => $applications, 'storeNum' => $storeNum]);
    }

    public function showStore($storeId)
    {
        $userItems = Item::where('user_id', Auth::id())->get();
        $userItemNum = $userItems->count();
        $store = Store::where('id', $storeId)->first();   
        $applications = Application::where('store_id', $storeId)->get(); 

        return view('welcome.show', ['store' => $store, 'applications' => $applications, 'userItems' => $userItems, 'userItemNum' => $userItemNum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
