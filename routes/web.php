<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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
Route::get('/detail/{id}',[ProductController::class,'index'])->name('detail');
Route::get('index',[HomeController::class,'index'])->name('index');
// Route::get('/layout',function(){
//     return view('layout.master');
// });
//Route::get('/product-type/{id}',[HomeController::class,'getProductType'])->name('getProductType');
Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');