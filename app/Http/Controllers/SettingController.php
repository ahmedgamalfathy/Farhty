<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
                //privacy_policy , terms_conditions
    /**
     * Display a listing of the resource.
     */
    public function privacy()
    {
     $privacy =Setting::select('privacy_policy','id')->get();
     return view('Dashboard.privacy.index',compact('privacy'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function privacy_edit($id)
    {
        $privacy=Setting::findOrFail($id);
        return view('Dashboard.privacy.edit',compact('privacy'));
    }

    public function privacy_update(Request $request,$id)
    {
       $data=$request->validate([
        'privacy_policy' =>"required|string",
        // 'terms_conditions'=>'nullable|string'
       ]);
       $privacy =Setting::findOrFail($id);
       $privacy->update($data);
       return redirect()->route('privacy');

    }


    public function condition()
    {
        $condition =Setting::select('terms_conditions','id')->get();
        return view('Dashboard.conds.index',compact('condition'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function condition_edit($id)
    {
       $cond= Setting::findOrFail($id);
       return view('Dashboard.conds.edit',compact('cond'));
    }

    /**
     * Display the specified resource.
     */
    public function condition_update(Request $request,$id)
    {
        $data=$request->validate([
            'terms_conditions' =>"required|string",
           ]);
           $privacy =Setting::findOrFail($id);
           $privacy->update($data);
           return redirect()->route('condition');

    }

}
