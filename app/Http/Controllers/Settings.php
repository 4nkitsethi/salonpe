<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Setting;

class Settings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return Inertia::render('Settings/Index',[
                                                    "location" => Setting::where('name','Location')->first(),
                                                    "contact" => Setting::where('name','Contact')->first(),
                                                    "website" => Setting::where('name','Website')->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function settingEdit(string $type){        
        if($type == 'location'){            
            return Inertia::render('Settings/Location' , [ "location" => Setting::where('name','Location')->first()]);
        }elseif($type == 'contact'){
            return Inertia::render('Settings/Contact' , [ "contact" => Setting::where('name','Contact')->first()]);
        }elseif($type == 'website'){
            return Inertia::render('Settings/Website' , [ "website" => Setting::where('name','Website')->first()]);
        }
    }


    public function settingStore(Request $request ,string $type){        
        if($type == 'location'){
            Setting::where('name','Location')->update([ "data" => $request->all() ]);
        }elseif($type == 'contact'){
            Setting::where('name','Contact')->update([ "data" => $request->all() ]);
        }elseif($type == 'website'){
            Setting::where('name','Website')->update([ "data" => $request->all() ]);
        }

        return redirect()->route('setting.index');
    }
}
