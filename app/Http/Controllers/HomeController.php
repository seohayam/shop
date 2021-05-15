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

     public function index()
     {
         if(Auth::guard('user')->check())
        {
            return redirect()->route('items.index', ['user' => Auth::guard('user')->id()]);
        }elseif(Auth::guard('store_owner')->check())
        {
            return redirect()->route('stores.index', ['store_owner' => Auth::guard('store_owner')->id()]);
        }else{
            return view('homes.index');
        }
     }
}
