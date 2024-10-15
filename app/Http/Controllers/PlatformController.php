<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $platforms = Platform::all();
        return view('Dashboard.platforms.index',compact('platforms')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data =$request->validate([
            "name"=>'required|string',
            "photo"=>'required|image|mimes:png,jpg,svg,gif'
        ]);
        $photo =$request->file('photo')->store('platforms','image');
        $data['photo']= $photo;
        Platform::create($data);
        return redirect()->route('platforms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Platform $platform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Platform $platform)
    {
        return view('Dashboard.platforms.edit',compact('platform'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Platform $platform)
    {
        $data =$request->validate([
            "name"=>'required|string',
            "photo"=>'nullable|image|mimes:png,jpg,svg,gif'
        ]);
        if($platform->photo){
            Storage::disk('image')->delete($platform->photo);
        }
        $photo =$request->file('photo')->store('platforms','image');
        $data['photo']= $photo;
        $platform->update($data);
        return redirect()->route('platforms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platform $platform)
    {
        $platform->delete();
        Storage::disk('image')->delete($platform->photo);
        return back();
    }
}
