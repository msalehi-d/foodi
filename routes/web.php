<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/check', [AuthController::class, 'loginCheck'])->name('login.check');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{category:slug}', [FoodController::class, 'category'])->name('food.category');

Route::get('/food/{food}', [FoodController::class, 'show'])->name('food.show');


Route::name('customer.')->prefix('customer')->middleware(['auth'])->group(function () {
    Route::post('order/add/{food}', [OrderController::class, 'add'])->name('order.add');
    Route::get('order/show', [OrderController::class, 'show'])->name('order.show');
    Route::post('order/{order}/submit', [OrderController::class, 'submit'])->name('order.submit');
    Route::patch('order/{order}/update', [OrderController::class, 'update'])->name('order.update');
    
    Route::get('order/index', [CustomerOrderController::class, 'index'])->name('order.index');
    Route::get('account', [CustomerOrderController::class, 'index'])->name('account');
});
