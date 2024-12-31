<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BookController;

use App\Http\Controllers\SalePageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChangeLogController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use App\Http\Middleware\RedirectIfNotEmployee;

Route::get('/', [SalePageController::class, 'index'])->name('home');
Route::get('/book-by-category/book-details/{book_id}', [SalePageController::class, 'showBookDetails'])->name('sale.showBookDetails');
Route::get('/book-by-category/{category}', [SalePageController::class, 'showBookByCategory'])->name('sale.showBookByCategory');
Route::get('/book-by-type/{booktype_id}', [SalePageController::class, 'showBookByType'])->name('sale.showBookByType');
Route::get('/book-details/{book_tittle_id}', [SalePageController::class, 'showBookDetails'])->name('sale.showBookDetails');

Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
    Route::resource('cart', CartController::class);
    // Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::post('/update-cart', [CartController::class, 'update'])->name('cart.update');
    // Route::post('/remove-from-cart', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::get('/admin', function () {
    return view('master.admin');
})->name('home.admin');

Route::group(['prefix' => 'account'], function () {

    Route::get('/login', [AccountController::class, 'login'])->name('account.login');
    Route::post('/login', [AccountController::class, 'checkLogin']);
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');

    Route::get('/verify-account/{email}', [AccountController::class, 'verify'])->name('account.verify');
    Route::get('/register', [AccountController::class, 'register'])->name('account.register');
    Route::post('/register', [AccountController::class, 'checkRegister']);

    Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::post('/profile', [AccountController::class, 'checkProfile']);

    Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
        Route::get('/change-password', [AccountController::class, 'changePassword'])->name('account.change-password');
        Route::post('/change-password', [AccountController::class, 'checkChangePassword']);

        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::post('/profile', [AccountController::class, 'checkProfile']);
    });

    Route::get('/forgot-password', [AccountController::class, 'forgotPassword'])->name('account.forgot-password');
    Route::post('/forgot-password', [AccountController::class, 'checkForgotPassword']);

    Route::get('/reset-password/{token}', [AccountController::class, 'resetPassword'])->name('account.reset-password');
    Route::post('/reset-password/{token}', [AccountController::class, 'checkResetPassword']);
});

Route::get('/admin/login',[AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login',[AdminController::class, 'checkLogin']);

Route::group(['prefix' => 'admin', 'middleware' => [RedirectIfNotEmployee::class]], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/statistics', [AdminController::class, 'index'])->name('admin.statistics');
    Route::get('/sales-report', [AdminController::class, 'salesReport'])->name('admin.salesReport');
    Route::get('/export-sales-report', [AdminController::class, 'exportSalesReport'])->name('admin.exportSalesReport');

    Route::resource('book', BookController::class);
    Route::get('/book-date-image/{image}', [BookController::class, 'destroyImage'])->name('book.destroyImage');

    Route::get('/change-logs', [ChangeLogController::class, 'index'])->name('change-logs.index');
    Route::post('/change-logs/revert/{id}', [ChangeLogController::class, 'revert'])->name('change-logs.revert');
});

Route::get('/test', function () {
    return view('GioHang');
});

Route::get('/test1', function () {
    return view('layout.partials.Header_Employee');
});
