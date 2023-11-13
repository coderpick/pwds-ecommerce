<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* admin routes start */


Route::group(['prefix'=>'admin', 'as' =>'admin.', 'middleware'=>['auth','admin']], function(){  

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
    Route::resource('category', CategoryController::class); 
    Route::resource('sub-category', SubCategoryController::class); 
    Route::resource('brand', BrandController::class); 
    
});

/* admin routes end */

