<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class applicationController extends Controller
{

    public function __construct(){
        
        if(Auth::guard('store_owner')->check())
        {
            $this->middleware('auth:store_owner');
        }else{
            $this->middleware('auth');
        }        
    }

    public function index(){

        $applications = Application::with('user','storeOwner')->get();
        return view('applications.index', ['applications' => $applications]);

    }
}