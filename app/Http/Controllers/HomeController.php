<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Store;
use App\User;
use App\StoreOwner;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userIndex()
    {
        // $items = Item::where('user_id', Auth::id())->with('user')->get();

        // return view('items.index', ['items'=> $items]);
        $items = Item::where('user_id', Auth::id())->with('user')->get();
        $itemMax = Item::max('id');                
        $user = User::where('id', Auth::id())->with('item')->first();        

        return view('items.index',['items'=> $items, 'user' => $user, 'itemMax' => $itemMax]);
    }

    public function storeOwnerIndex()
    {        
        // $stores = Store::where('store_owner_id', Auth::id())->with('storeOwner')->get();
        
        // return view('store_owners.home', ['stores'=> $stores]);

        $stores = store::where('store_owner_id', Auth::id())->with('storeOwner')->get();
        $storeMax = store::max('id');                
        $store_owner = StoreOwner::where('id', Auth::id())->with('store')->first();        

        return view('stores.index',['stores'=> $stores, 'store_owner' => $store_owner, 'storeMax' => $storeMax]);

    }
}
