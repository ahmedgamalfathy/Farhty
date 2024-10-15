<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $banners= Banner::all();
        return view('Dashboard.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data= $request->validate([
        "photo"=>"required|image|mimes:png,jpg,svg,gif",
        "link"=>"nullable|url"
        ]);
       $photo= $request->file('photo')->store('banners','image');
       $data['photo']=$photo;
        Banner::create($data);
        return redirect()->route('banners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('Dashboard.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $data= $request->validate([
            "photo"=>"required|image|mimes:png,jpg,svg,gif",
            "link"=>"nullable|url"
            ]);
            if($banner->photo){
                Storage::disk('image')->delete($banner->photo);
            }
           $photo= $request->file('photo')->store('banners','image');
           $data['photo']=$photo;
           $banner->update($data);
            return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        Storage::disk('image')->delete($banner->photo);
        return back();
    }
}
