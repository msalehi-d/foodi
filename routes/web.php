<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{category:slug}',[FoodController::class, 'category'])->name('food.category');

Route::get('/food/{food}',[FoodController::class, 'show'])->name('food.show');

Route::get('order/show',[OrderController::class, 'show'])->name('order.show');
Route::post('order/{order}',[OrderController::class, 'submit'])->name('order.submit');
Route::post('order/add/{food}',[OrderController::class, 'add'])->middleware(['auth'])->name('order.add');
Route::patch('order/{order}/update',[OrderController::class, 'update'])->name('order.update');
Route::delete('order/{food}',[OrderController::class, 'destroy'])->name('order.destroy');
