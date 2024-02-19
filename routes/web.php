<?php

use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
Route::post('plans',[PlanController::class, 'index'])->name('plans');
// Route::get('create-plan',[PayPalController::class, 'createPlan'])->name('create.plan');
Route::get('product', [ProductController::class, 'index'])->name('product');
Route::post('subscribe', [PayPalController::class, 'subscribe'])->name('subscribe');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
