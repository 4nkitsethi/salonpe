<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class Dashboard extends Controller
{
    //
    public function dashboard(Request $request){
        return Inertia::render('Dashboard', [
            'filters' => ['search', 'trashed'],
            'users' => User::orderBy('name')
                            ->where(function($query) use($request){
                                if($request->has("search")){
                                    $searchBy = ($request->has("by")) ? $request->by : "name";
                                    $query->where($searchBy,'LIKE','%'.$request->search."%");
                                }                  
                            })
                            ->paginate(10)
                            ->withQueryString()
                            ->through(fn ($user) => [
                                'id' => $user->id,
                                'name' => $user->name,
                                'email' => $user->email,
                                'created_at' => $user->created_at,
                            ]),
        ]);
    }
}
