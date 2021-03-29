<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Item as Item;
use App\Store;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use 

class ItemController extends Controller
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
        
        $items = Item::with('user')->get();

        return view('items.index',['items'=> $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {                      

        $item = new Item();              
        $user_id = Auth::id();
    
        $item->title        = $request->title;
        $item->description  = $request->description;
        $item->value        = $request->value;        
        $item->item_url     = $request->item_url;
        $item->created_at    = new DateTime();
        $item->user_id      = $user_id;
        
        // $item->image = スッキップ
        
        $item->save();                

        return redirect()->route('items.show',$item->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {        
        return view('items.show',['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        if(Auth::id() != $item->user_id){
            return abort('403');
        }

        return view('items.edit', ['item' => $item]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item)
    {        
        
        if(Auth::id() != $item->user_id) {
            return abort('403');
        }            

        $item->title        = $request->title;
        $item->description  = $request->description;
        $item->value        = $request->value;        
        $item->item_url     = $request->item_url;
        $item->updated_at = new DateTime();

        $item->save();
        
        return redirect()->route('items.edit', $item);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Item $item)
    {                        

        if(Auth::id() != $item->user_id){
            return abort('403');            
        }            
            
        $item->delete();

        return redirect()->route('items.index');
        
    }
}
