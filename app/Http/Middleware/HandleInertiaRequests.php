<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Product;
use Brand;
use User;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
                'userCount' => User::count(),
                'productCount' => Product::count(),
                'brandCount' => Brand::count()
            ],
            'quillToolbar' => [
                                ['bold', 'italic', 'underline', 'strike'], 
                                ['link', 'blockquote'], 
                                [[ 'header' => [1, 2, 3, 4, 5, 6, false], ]], 
                                [[ 'list'=> 'ordered'],  ['list'=> 'bullet' ]] , 
                                [[ 'script'=> 'sub'] , [ 'script'=> 'super' ]],
                                [[ 'align' =>  [] ]], 
                                [[ 'indent' => '-1' ], [ 'indent' => '+1' ]], 
                                [[ 'color' => [] ], [ 'background' => [] ]],
                                ['clean'],
                               ] ,
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }
}
