<?php

namespace App\Http\Controllers;

use App\Item;
use App\Like;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct(Auth $auth){

        $this->middleware('auth:user,store_owner');
    }

    // ==========item===========
    public function firstCheck($version, $id)
    {
        $version_id = "{$version}_id";

        if(Auth::guard('user')->check())
        {
            $user_id = Auth::guard('user')->id();
            $like = Like::where($version_id, $id)->where('user_id',$user_id)->first();
        }elseif(Auth::guard('store_owner')->check())
        {
            $user_id = Auth::guard('store_owner')->id();
            $like = Like::where($version_id, $id)->where('store_owner_id',$user_id)->first();
        }else{
            return response()->json(['error' => "ユーザー情報がありません"]);
        }

        if($like) {
            // likeがあればそれをそのまま返す
            $count = $like->where($version_id, $id)->where('status',1)->count();
            return [$like->status,$count];
        } else {
            // likeがなければ作って返す

            $like = new Like();

            if(Auth::guard('user')->check())
            {
                $like->user_id = $user_id;
            }elseif(Auth::guard('store_owner')->check())
            {
                $like->store_owner_id = $user_id;
            }else{
                return false;
            }

            $like->$version_id = $id;
            $like->status = 0;

            $like->save();
            $count = $like->where($version_id, $id)->where('status',1)->count();

            return [$like->status,$count];
        }
    }

    // 省略

    public function check($version, $id)
    {
        $version_id = "{$version}_id";

        if(Auth::guard('user')->check())
        {
            $user_id = Auth::guard('user')->id();
            $like = Like::where($version_id, $id)->where('user_id',$user_id)->first();
        }elseif(Auth::guard('store_owner')->check())
        {
            $user_id = Auth::guard('store_owner')->id();
            $like = Like::where($version_id, $id)->where('store_owner_id',$user_id)->first();
        }else{
            return response()->json(['error' => "ユーザー情報がありません"]);
        }

        if($like->status == 0) {
            // likeがあればそれをそのまま返す
            $like->status = 1;
            $like->save();
            $count = $like->where($version_id, $id)->where('status',1)->count();
            return [$like->status,$count];
            // return response()->json([$like,$count]);
        } else{
            $like->status = 0;
            $like->save();
            $count = $like->where($version_id, $id)->where('status',1)->count();

            return [$like->status,$count];
            // return response()->json([$like,$count]);
        }
    }
}