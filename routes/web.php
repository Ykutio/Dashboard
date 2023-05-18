<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ModelcarController;
use App\Http\Controllers\Admin\CarController;


Route::get( '/', [HomeController::class, 'index'] )->name( 'home' );
Route::get( '/products/{id?}/{type?}', [ProductsController::class, 'allproducts'] )->name( 'products' );
Route::get( '/product/{id}', [ProductController::class, 'oneproduct'] )->name( 'product' );
Route::get( '/about', [AboutController::class, 'aboutus'] )->name( 'about' );//also about all types of weapons
Route::get( '/contact', [ContactController::class, 'contactus'] )->name( 'contact' );//also write us

Route::prefix( 'log' )->group( function ()
{
    Route::get( '/registration', [RegController::class, 'createuser'] )->name( 'user.create' );
    Route::post( '/registration', [RegController::class, 'storeuser'] )->name( 'user.store' );
    Route::post( '/in', [RegController::class, 'authorization'] )->name( 'authorization' );
    Route::get( '/out', [RegController::class, 'destroycookie'] )->name( 'destroycookie' );
} );

Route::prefix( 'user' )->group( function ()
{
    Route::get( '/show/{id}', [UserController::class, 'showuser'] )->name( 'user.show' );
    Route::get( '/edit/{id}', [UserController::class, 'edituser'] )->name( 'user.edit' );
    Route::patch( '/update/{id}', [UserController::class, 'updateuser'] )->name( 'user.update' );
    Route::delete( '/destroy/{id}', [UserController::class, 'destroyuser'] )->name( 'user.destroy' );
} );

Route::prefix( 'cart' )->group( function ()
{
    Route::get( '/show/{id}', [CartController::class, 'showcart'] )->name( 'cart.show' );
    Route::get( '/edit/{id}', [CartController::class, 'editcart'] )->name( 'cart.edit' );
    Route::post( '/update/{id}', [CartController::class, 'updatecart'] )->name( 'cart.update' );
    Route::post( '/destroy/{id}', [CartController::class, 'destroycart'] )->name( 'cart.destroy' );
} );

Route::get( 'admin/login', [LoginController::class, 'index'] )->middleware( 'AdminLogin' )->name( 'LoginPageAdmin' );
Route::post( 'admin/singin', [LoginController::class, 'singin'] )->middleware( 'AdminLogin' )->name( 'LoginAdmin' );
Route::post( 'admin/logout', [LoginController::class, 'logout'] )->name( 'LogoutAdmin' );


Route::middleware( 'admin' )->group( function ()
{

    Route::prefix( 'admin' )->group( function ()
    {
        Route::get( '/', [IndexController::class, 'index'] )->name( 'AdminMainPage' );

        //resource Brand
        Route::resource( 'brands', BrandController::class );
        Route::post( 'brands/changestatus', [BrandController::class, 'changeStatus'] )->name( 'AdminChangeStatusBrand' );
        Route::post( 'brands/ordering', [BrandController::class, 'orderingBrand'] )->name( 'orderingBrand' );
        
        
        //resource Modelcar
        Route::resource( 'modelcars', ModelcarController::class );
        Route::post( 'modelcars/changestatus', [ModelcarController::class, 'changeStatus'] )->name( 'AdminChangeStatusModelcar' );
        Route::post( 'modelcars/ordering', [ModelcarController::class, 'orderingModelcar'] )->name( 'orderingModelcar' );
        
        
        //resource Car
        Route::resource( 'cars', CarController::class );
        Route::post( 'cars/changestatus', [CarController::class, 'changeStatus'] )->name( 'AdminChangeStatusCar' );
        Route::post( 'cars/ordering', [CarController::class, 'orderingCar'] )->name( 'orderingCar' );

    } );
} );
