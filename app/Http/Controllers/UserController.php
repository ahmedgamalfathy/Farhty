<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(Request $request)
    {
        $users= User::select('id','name','phone','type')
        ->where('type',1)->with('posts','competitions')->paginate()->withQueryString();
        $posts=Post::all()->count();
        $competitions=Competition::all()->count();
        return view('Dashboard.users.index',compact(['users','posts','competitions']))->with('i',($request->input('page',1)-1)*15);
    }

   public function posts($id)
   {
       $posts =Post::where('user_id',$id)->get();
       return view('Dashboard.posts.index',compact('posts'));
   }
   public function competition($id){
    $comps= competition::where('user_id',$id)->get();
    return view('Dashboard.competitions.index',compact('comps'));
   }
   public function winners($id){
    $comp= Competition::findOrFail($id);
     $winners=$comp->winners;
    return view('Dashboard.winners.index',compact('winners'));
   }
}
