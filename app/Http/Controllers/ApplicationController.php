<?php

namespace App\Http\Controllers;

use App\Application;
use App\Item;
use App\Store;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class applicationController extends Controller
{

    public function __construct(Auth $auth){
        
        $this->middleware('auth:user,store_owner');
    }

    public function index(Request $request){         

        $query = $request->query('application_id');
        $query['application_id'] = 1;

        if(Auth::guard('store_owner')->check())
        {
            $applications = Application::where('from_store_owner_id', Auth::id())->orWhere('to_store_owner_id', Auth::id())->with('item','store','fromUser','toUser','fromStoreOwner','toStoreOwner')->get();                                
            // $store = Store::where('store_owner_id', $applications->from_store_owner_id)->orWhere('store_owner_id', $applications->to_store_owner_id)->get();
        }elseif(Auth::check())
        {
            $applications = Application::where('from_user_id', Auth::id())->orWhere('to_user_id', Auth::id())->with('item','store','fromUser','toUser','fromStoreOwner','toStoreOwner')->get();                                
        }                       
        
        if(empty($applications))
        {
            return redirect()->route('welcome.index');
        }        

        return view('applications.index', compact('applications','query'));

    }

    public function show(Request $request,Application $application)
    {
        // dd($application);

        // $url = url()->current();
        // $url = $request->application;
        // dd($url);        
        return view('applications.show', ['application' => $application]);
    }
    
    public function store(Request $request)
    {   
        // dd($request);

        // 同じ値が存在しないの制御
        // ユーザーログインの時
        // アプリケーションのwhere検索でitem_idとstore_idのどちらともの数字が既に存在している数字の組み合わせで泣けらばOK！

        if(Auth::check() && !Auth::guard('store_owner')->check()){
            $application = Application::where('item_id',$request->userItemId)->where('store_id',$request->storeId)->first();
        }elseif(Auth::guard('store_owner')->check()){
            $storeId = Auth::guard('store_owner')->id();
            $application = Application::where('item_id',$request->itemId)->where('store_id',$storeId)->first();
        }

        if($application != null)
            {
                return back()->with('id',$application->id)->withErrors(['既に応募積みです！']);
            }

        // ===応募機能完了===        
        $application = new Application();           

        if(Auth::check() && !Auth::guard('store_owner')->check())
        {
            $application->item_id = $request->userItemId;
            $application->store_id = $request->storeId;
            $application->from_user_id  = Auth::id();
            $application->to_store_owner_id = $request->storeOwnerId;

        }elseif(Auth::guard('store_owner')->check())
        {
            $store = Store::where('store_owner_id', $storeId)->first();
            $application->store_id = $store->id;
            $application->item_id = $request->itemId;
            $application->from_store_owner_id = $storeId;
            $application->to_user_id = $request->userId;                    
        }
        
        $application->applicaiton_status = "onboard";
        $application->created_at = new DateTime();               

        $application->save();

        return redirect()->route('applications.index',['user' => Auth::id(), 'store_owner' => Auth::guard('store_owner')->id()]);
    }


    public function update(Request $request)
    {
        // statusのアップデート
        $applicationId = $request->application_id;
        $application = Application::where('id', $applicationId)->first();
        $application->applicaiton_status = $request->status;

        $application->save();

        return redirect()->route('applications.show', ['application' => $application]);

    }
}