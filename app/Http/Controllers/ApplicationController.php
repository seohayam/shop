<?php

namespace App\Http\Controllers;

use App\Application;
use App\Store;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class applicationController extends Controller
{

    public function __construct(){   
        
        $this->middleware('auth');

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

        // ===応募機能完了===        
        $application = new Application();        

        // user loginの時
        if(Auth::check()&& !Auth::guard('store_owner')->check())
        {
            $application->store_id = $request->store_id;
            $application->from_user_id  = Auth::id();
            $application->to_store_owner_id = $request->storeOwner_id;

        }elseif(Auth::guard('store_owner')->check())
        {            

            $application->item_id = $request->item_id;
            $application->from_store_owner_id = Auth::guard('store_owner')->id();
            $application->to_user_id = $request->user_id;                    
        }
        
        $application->applicaiton_status = "onboard";
        $application->created_at = new DateTime();               
        
        $application->save();

        // 練習用
        // userの場合
        // if(Auth::check()&& !Auth::guard('store_owner')->check())
        // {
        //     $application= Application::where('id','1')->with('toStoreOwner','fromUser')->first();
        // }elseif(Auth::guard('store_owner')->check())
        // {
        //     $application= Application::where('id','1')->with('item','fromStoreOwner','toUser')->first();
        // }        

        return redirect()->route('applications.index',['user' => Auth::id(), 'store_owner' => Auth::id()]);
    }
}