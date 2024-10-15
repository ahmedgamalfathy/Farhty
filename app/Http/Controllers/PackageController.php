<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $packages= Package::paginate();
        return view('Dashboard.packages.index',compact('packages'))->with('i',($request->input('page',1)-1)*15);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    name, description, original_price, offer_price, duration
    $data =$request->validate([
        "name"=>'required|string|unique:packages,name',
        "original_price"=>'required|numeric',
        "offer_price"=>'nullable|numeric',
        "duration"=>"required|numeric",
        "description"=>"nullable|array"
    ]);
    if($request->has('description')){
        $data['description']=json_encode($request->input('description'));
      }else{
        $data['description']=null;
      }
        Package::create($data);
        return redirect()->route('packages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('Dashboard.packages.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $data =$request->validate([
            "name"=>'required|string',
            "original_price"=>'required|numeric',
            "offer_price"=>'nullable|numeric',
            "duration"=>"required|numeric",
            "description"=>"nullable|string"
        ]);
        $data['description']=json_encode( $request->input('description'));
        $package->update($data);
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return back();
    }
}
