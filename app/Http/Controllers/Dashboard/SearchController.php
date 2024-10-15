<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contacts;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
     public function search(Request $request)
     {
        $search = $request->input('search');
        $results = User::where('name', 'like', "%$search%")
        ->orWhere('phone','like',"%$search%")
        ->paginate()->withQueryString();
        return view('Dashboard.results.index',compact(['results','search']))->with('i',($request->input('page',1)-1)*15);
     }
     public function contact_search(Request $request)
     {
         $search =$request->input('search');
         $results =Contacts::where('name','like',"%$search%")
         ->orWhere('email','like',"%$search%")
         ->orWhere('phone','like',"%$search%")
         ->paginate()->withQueryString();
         return view('Dashboard.results.contact',compact('results'))->with('i',($request->input('page',1)-1)*15);
     }
}
