<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brand;
use Inertia\Inertia;

class Brands extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        return Inertia::render('Brands/Index', [
            'filters' => ['search', 'trashed'],
            'brands' => Brand::orderBy('id')
                            ->where(function($query) use($request){
                                if($request->has("search")){
                                    $searchBy = ($request->has("by")) ? $request->by : "name";
                                    $query->where($searchBy,'LIKE','%'.$request->search."%");
                                }                  
                            })
                            ->paginate(10)
                            ->onEachSide(0)
                            ->withQueryString()
                            ->through(fn ($brand) => [
                                'id' => $brand->id,
                                'name' => $brand->name,
                                'created_at' => $brand->created_at,
                            ]),
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
}
