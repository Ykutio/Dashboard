<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\WeaponController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\CountryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{id?}/{type?}', [ProductsController::class, 'allproducts'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'oneproduct'])->name('product');
Route::get('/about', [AboutController::class, 'aboutus'])->name('about'); //also about all types of weapons
Route::get('/contact', [ContactController::class, 'contactus'])->name('contact'); //also write us

Route::get('/test', [TestController::class, 'testing'])->name('test');
Route::get('/show_cart_items', [TestController::class, 'showCartItems'])->name('showCartItems');
Route::get('/cart', [TestController::class, 'index'])->name('cartIndex');
Route::post('/add_to_cart', [TestController::class, 'addToCart'])->name('addToCart');

Route::prefix('log')->group(function () {
    Route::get('/registration', [RegController::class, 'createuser'])->name('user.create');
    Route::post('/registration', [RegController::class, 'storeuser'])->name('user.store');
    Route::post('/in', [RegController::class, 'authorization'])->name('authorization');
    Route::get('/out', [RegController::class, 'destroycookie'])->name('destroycookie');
});

Route::prefix('user')->group(function () {
    Route::get('/show/{id}', [UserController::class, 'showuser'])->name('user.show');
    Route::patch('/update/{id}', [UserController::class, 'update'])->name('user.update');
});

Route::prefix('search')->group(function () {
    Route::get('/', [SearchController::class, 'searching'])->name('search');
});

Route::get('admin/login', [LoginController::class, 'index'])->middleware('AdminLogin')->name('LoginPageAdmin');
Route::post('admin/singin', [LoginController::class, 'singin'])->middleware('AdminLogin')->name('LoginAdmin');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('LogoutAdmin');


Route::middleware('admin')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('AdminMainPage');

        //resource Weapon
        Route::resource('weapons', WeaponController::class);
        Route::post('weapons/changestatus', [WeaponController::class, 'changeStatus'])->name('ChangeStatusWeapon');
        Route::post('weapons/ordering', [WeaponController::class, 'orderingWeapon'])->name('orderingWeapon');
        //resource Country
        Route::resource('countries', CountryController::class);
        Route::post('countries/changestatus', [CountryController::class, 'changeStatus'])->name('ChangeStatusCountry');
        Route::post('countries/ordering', [CountryController::class, 'orderingCountry'])->name('orderingCountry');
        //resource Type
        Route::resource('types', TypeController::class);
        Route::post('types/changestatus', [TypeController::class, 'changeStatus'])->name('ChangeStatusType');
        Route::post('types/ordering', [TypeController::class, 'orderingType'])->name('orderingType');
    });
});
