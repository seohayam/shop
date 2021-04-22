<?php

namespace App\Http\Controllers;

use App\Application;
use App\Comment;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(){
        
        // $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();

        $comment->content = $request->content;
        $comment->application_id = $request->application_id;

        if(Auth::guard('store_owner')->check())
        {
            $comment->from_store_owner_id = $request->store_owner_id;
            $comment->to_user_id = $request->user_id;
        }

        if(Auth::check())
        {
            $comment->from_user_id = $request->user_id;
            $comment->to_store_owner_id =  $request->store_owner_id;
        }
        // $comment->from_user_id = $request->from_user_id;
        // $comment->from_store_owner_id = $request->from_store_owner_id;
        // $comment->to_user_id = $request->to_user_id;
        // $comment->to_store_owner_id =  $request->to_store_owner_id;
        $comment->updated_at = new DateTime();

        // dd($comment);

        $comment->save();

        $applicationId = $request->application_id;

        return redirect()->route('applications.show', ['application' => $applicationId]);

    }


    public function getData(Request $request)
    {
        // $applicationId = $request->query('application_id');

        $applicationId = $request->application;        
        
        $comments = Comment::where('application_id', $applicationId)->orderBy('created_at', 'asc')->with('fromUser','fromStoreOwner','toUser','toStoreOwner')->get();

        if(Auth::guard('store_owner')->check())
        {
            $auth = "store_owner";
        }elseif(Auth::check()){
            $auth = "user";
        }
        
        $json = ['comments' => $comments, 'auth' => $auth];
        return response()->json($json);
    }
}
