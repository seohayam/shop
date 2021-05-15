<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\ItemRequest;
use App\Item as Item;
use App\Store;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use JD\Cloudder\Facades\Cloudder;

class ItemController extends Controller
{

    public function __construct(){
        
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Item::where('user_id', Auth::id())->with('user')->get();
        $itemMax = $items->count();
        $user = User::where('id', Auth::id())->with('item')->first();                
        $fromUserApplicationNum = Application::where('from_user_id', Auth::id())->count();
        $fromStoreOwnerApplicationNum = Application::where('to_user_id', Auth::id())->count();
        
        return view('items.index',['items'=> $items, 'user' => $user, 'itemMax' => $itemMax,'fromUserApplicationNum' => $fromUserApplicationNum, 'fromStoreOwnerApplicationNum' => $fromStoreOwnerApplicationNum]);
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
        
        $image = $request->file('image');
        if($image)
        {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 500,
                'height'    => 500,
            ]);
            // DB
            $item->image_path   = $logoUrl;
            $item->public_id    = $publicId;
        }
        
        $item->save();                

        return redirect()->route('items.show',['user' => Auth::id(),'item' => $item]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,Item $item)
    {        
        return view('items.show',['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($item)
    {
        // $item = Item::where('id', $item)->with('user')->first();       
        $item = Item::find($item);
        
        if(Auth::id() != $item['user_id']){
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
    public function update(ItemRequest $request, $item)
    {   
        // 画像アップデート：画像を消す→新規追加
        // $item = Item::where('id', $item)->with('user')->first();
        $item = Item::find($item);
        if(Auth::id() != $item['user_id']) {
            return abort('403');
        }

        $item->title        = $request->title;
        $item->description  = $request->description;
        $item->value        = $request->value;        
        $item->item_url     = $request->item_url;
        $item->updated_at = new DateTime();

        $item->save();
        
        return redirect()->route('items.edit', ['user' => Auth::id(), 'item' => $item]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$item)
    {                                
        $item = Item::where('id', $item)->with('user')->first();                 

        if(Auth::id() != $item->user_id){
            return abort('403');            
        }                  
            
        $item->delete();

        return redirect()->route('items.index', ['user' => Auth::id()]);
        
    }
}
