<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Products;
use App\Http\Controllers\Brands;
use App\Http\Controllers\Users;
use App\Http\Controllers\Attributes;
use App\Http\Controllers\Tags;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Settings;
use App\Http\Controllers\Banners;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTypes;
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
    return view('landing');
});

Route::get('/welcome', function () {
    return Inertia::render("Welcome");
});

Route::resource('/product',Products::class);
Route::resource('/brand',Brands::class);
Route::resource('/user',Users::class);
Route::resource('/category',Categories::class);
Route::resource('/product-type',ProductTypes::class);
Route::resource('/attribute',Attributes::class);
Route::resource('/tag',Tags::class);
Route::resource('/setting',Settings::class);
Route::resource('/banner',Banners::class);

Route::get("/setting/edit/{type}",[Settings::class,'settingEdit'])->name("setting.edit.type");
Route::post("/setting/edit/{type}",[Settings::class,'settingStore'])->name("setting.store.type");
// 
Route::get('/sub-category',[Categories::class,'subCategoryIndex'])->name('sub.category.index');
Route::get('product-attribute/{productId}',[Products::class,'createProductAttribute'])->name('create.product.attribute');
Route::get('product-attribute/{attributeId}/edit',[Products::class,'editProductAttribute'])->name('edit.product.attribute');
Route::post('product-attribute-store/{productId}',[Products::class,'storeProductAttribute'])->name('store.product.attribute');

Route::get('/dashboard', [Dashboard::class, 'dashboard'])->middleware("auth")->name('dashboard');

require __DIR__.'/auth.php';
