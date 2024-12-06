<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('home.index');
})->name('home');
Route::group(['prefix' => 'account'], function () {

    Route::get('/login', [AccountController::class, 'login'])->name('account.login');
    Route::post('/login', [AccountController::class, 'checkLogin']);

    Route::get('/verify-account/{email}', [AccountController::class, 'verify'])->name('account.verify');
    Route::get('/register', [AccountController::class, 'register'])->name('account.register');
    Route::post('/register', [AccountController::class, 'checkRegister']);

    Route::get('/change-password', [AccountController::class, 'changePassword'])->name('account.change-password');
    Route::post('/change-password', [AccountController::class, 'checkChangePassword']);

    Route::get('/forgot-password', [AccountController::class, 'forgotPassword'])->name('account.forgot-password');
    Route::post('/forgot-password', [AccountController::class, 'checkForgotPassword']);
    Route::get('/reset-password', [AccountController::class, 'resetPassword'])->name('account.reset-password');
    Route::post('/reset-password', [AccountController::class, 'checkResetPassword']);
});