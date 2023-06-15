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

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/', function () {    return Inertia::render("Web/Salonpe"); })->name("salonpe.index");
Route::get('/wishlist', function () {    return Inertia::render("Web/Wishlist"); })->name("salonpe.wishlist");
Route::get('/contact-us', function () {    return Inertia::render("Web/ContactUs"); })->name("salonpe.contactus");
Route::get('/about-us', function () {    return Inertia::render("Web/AboutUs"); })->name("salonpe.aboutus");
Route::get('/account-dashboard', function () {    return Inertia::render("Web/AccountDashboard"); })->name("salonpe.account.dashboard");
Route::get('/account-orders', function () {    return Inertia::render("Web/AccountOrder"); })->name("salonpe.account.order");
Route::get('/account-profile', function () {    return Inertia::render("Web/AccountProfile"); })->name("salonpe.account.profile");
Route::get('/account-profile-edit', function () {    return Inertia::render("Web/AccountEditProfile"); })->name("salonpe.account.profile.edit");
Route::get('/account-save-address', function () {    return Inertia::render("Web/AccountSaveAddress"); })->name("salonpe.account.save.address");
Route::get('/account-login', function () {    return Inertia::render("Web/Login"); })->name("salonpe.account.login");
Route::get('/account-register', function () {    return Inertia::render("Web/Register"); })->name("salonpe.account.register");
Route::get('/blogs', function () {    return Inertia::render("Web/Blogs"); })->name("salonpe.blogs");
Route::get('/blog/read', function () {    return Inertia::render("Web/BlogRead"); })->name("salonpe.blog.read");
Route::get('/product/detail', function () {    return Inertia::render("Web/ProductDetail"); })->name("salonpe.product.detail");
Route::get('/payment/method', function () {    return Inertia::render("Web/PaymentMethod"); })->name("salonpe.payment.method");
Route::get('/billing', function () {    return Inertia::render("Web/BillingDetail"); })->name("salonpe.billing");
Route::get('/product/filter', function () {    return Inertia::render("Web/ProductFilteration"); })->name("salonpe.product.filter");
Route::get('/cart', function () {    return Inertia::render("Web/Cart"); })->name("salonpe.cart");




Route::get('/account-reset-password', function () {    return Inertia::render("Web/ChangePassword"); })->name("salonpe.account.change.password");

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
Route::get('/sub-category/create',[Categories::class,'subCategoryCreate'])->name('sub.category.create');
Route::post('/sub-category/store',[Categories::class,'subCategoryStore'])->name('sub.category.store');
Route::get('product-attribute/{productId}',[Products::class,'createProductAttribute'])->name('create.product.attribute');
Route::get('product-attribute/{attributeId}/edit',[Products::class,'editProductAttribute'])->name('edit.product.attribute');
Route::post('product-attribute-store/{productId}',[Products::class,'storeProductAttribute'])->name('store.product.attribute');

Route::get('/dashboard', [Dashboard::class, 'dashboard'])->middleware("auth")->name('dashboard');

require __DIR__.'/auth.php';
