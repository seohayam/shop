<?php

namespace App\Http\Controllers;

use App\Application;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        
    }


    public function getData(Request $request)
    {
        // $applicationId = $request->query('application_id');

        $applicationId = $request->application;        
        
        $comments = Comment::where('application_id', $applicationId)->orderBy('created_at', 'desc')->with('fromUser','fromStoreOwner','toUser','toStoreOwner')->get();
        
        $json = ['comments' => $comments];
        return response()->json($json);
    }
}
