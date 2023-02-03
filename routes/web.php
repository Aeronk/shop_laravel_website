<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
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
Route::get('/product-detail/{id}', [HomeController::class, 'singleProduct'])->name('product.detail');
Route::get('/products/pay/{id}', [PaymentController::class, 'pay'])->name('products.pay');
Route::get('/products/{product}/email', [PaymentController::class, 'emailReg'])->name('products.email-reg');

Route::post('/orders/save-order', [OrderController::class, 'saveOrder'])->name('order.save');


Route::post('/products/{id}/charge', [PaymentController::class,'processPayment'])->name('products.charge');
Route::get('/thank-you', [PaymentController::class, 'thankYou'])->name('thank-you');

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
});

Auth::routes();


