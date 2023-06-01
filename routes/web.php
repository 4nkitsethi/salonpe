<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Products;
use App\Http\Controllers\Brands;
use App\Http\Controllers\Users;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Abc',[
        "Name" => "Ankit Kumar"
    ]);
});

Route::resource('/product',Products::class);
Route::resource('/brand',Brands::class);
Route::resource('/user',Users::class);

Route::get('/dashboard', [Dashboard::class, 'dashboard'])->name('dashboard');

require __DIR__.'/auth.php';
