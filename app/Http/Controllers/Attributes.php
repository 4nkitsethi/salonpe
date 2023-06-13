<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use Inertia\Inertia;

class Attributes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        return Inertia::render('Attributes/Index', [
            'filters' => ['search', 'trashed'],
            'attributes' => Attribute::orderBy('id')
                            ->where(function($query) use($request){
                                if($request->has("search")){
                                    $searchBy = ($request->has("by")) ? $request->by : "name";
                                    $query->where($searchBy,'LIKE','%'.$request->search."%");
                                }                  
                            })
                            ->paginate(10)
                            ->onEachSide(0)
                            ->withQueryString()
                            ->through(fn ($attr) => [
                                'id' => $attr->id,
                                'name' => $attr->name,
                                'created_at' => $attr->created_at,
                            ]),
        ]);
    }
 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Attributes/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Attribute::create($request->all());
        return redirect()->route('attribute.index');
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
        $attribute = Attribute::find($id);
        return Inertia::render('Attributes/Edit',['attribute' => $attribute]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Attribute::where('id',$id)->update($request->all());
        return redirect()->route('attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
