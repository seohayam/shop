<?php

namespace App\Http\Controllers;

use App\Item;
use App\Store;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $items = Item::with('user')->get();
        $stores = Store::with('storeOwner')->get();

        return view('welcome', ['items' => $items, 'stores' => $stores]);
    }
}
