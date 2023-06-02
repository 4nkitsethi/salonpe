<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;
use Product;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        return Inertia::render('Products/Index', [
            'filters' => ['search', 'trashed'],
            'products' => Product::orderBy('id')
                            ->where(function($query) use($request){
                                if($request->has("search")){
                                    $searchBy = ($request->has("by")) ? $request->by : "name";
                                    $query->where($searchBy,'LIKE','%'.$request->search."%");
                                }                  
                            })
                            ->paginate(10)
                            ->onEachSide(0)
                            ->withQueryString()
                            ->through(fn ($product) => [
                                'id' => $product->id,
                                'name' => $product->product_name,
                                'product_type' => $product->product_type,
                                'brand' => $product->brand_id,
                                'category' => $product->category_id,
                                'sub_category' => $product->sub_category_id,
                                'type' => $product->product_type,
                                'created_at' => $product->created_at,
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
