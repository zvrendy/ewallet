<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\RedirectPaymentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('logout', [RedirectPaymentController::class, 'finish']);

Route::get('payment_finish', [RedirectPaymentController::class, 'finish']);

Route::name('admin.')->prefix('admin')->group(function () {
    Route::view('login', 'login')->name('auth.index');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::group(['middleware' => 'auth:web'], function () {
        Route::view('/', 'dashboard')->name('dashboard');

        Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index');
    });
});
