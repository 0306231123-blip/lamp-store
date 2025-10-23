<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SanPhamController;

/*
|--------------------------------------------------------------------------
| Trang chính
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('welcome'))->name('home');

/*
|--------------------------------------------------------------------------
| Xác thực người dùng
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Nhóm Admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    // Giao diện mẫu
    Route::view('/blank', 'admin.blank')->name('admin.blank');
    Route::view('/buttons', 'admin.buttons')->name('admin.buttons');
    Route::view('/flot', 'admin.flot')->name('admin.flot');
    Route::view('/forms', 'admin.forms')->name('admin.forms');
    Route::view('/grid', 'admin.grid')->name('admin.grid');
    Route::view('/icons', 'admin.icons')->name('admin.icons');
    Route::view('/login', 'admin.login')->name('admin.login');
    Route::view('/morris', 'admin.morris')->name('admin.morris');
    Route::view('/notifications', 'admin.notifications')->name('admin.notifications');
    Route::view('/panels', 'admin.panels-wells')->name('admin.panels');
    Route::view('/tables', 'admin.tables')->name('admin.tables');
    Route::view('/typography', 'admin.typography')->name('admin.typography');
    Route::view('/add', 'admin.add_product')->name('admin.add');

    // Quản lý sản phẩm
    Route::get('/sanpham', [SanPhamController::class, 'index'])->name('sanpham.index');
    Route::post('/sanpham', [SanPhamController::class, 'store'])->name('sanpham.store');
});

/*
|--------------------------------------------------------------------------
| Nhóm Người Dùng
|--------------------------------------------------------------------------
*/
Route::prefix('user')->group(function () {
    Route::view('/', 'user.index')->name('user.index');
    Route::view('/account', 'user.account')->name('user.account');
    Route::view('/checkout', 'user.checkout')->name('user.checkout');
    Route::view('/contact', 'user.contact')->name('user.contact');
    Route::post('/contact', fn() => view('user.contact'))->name('user.contact.post');
    Route::view('/login', 'user.login')->name('user.login');
    Route::view('/product', 'user.product')->name('user.product');
    Route::view('/single', 'user.single')->name('user.single');
    Route::view('/typo', 'user.typo')->name('user.typo');
});

/*
|--------------------------------------------------------------------------
| Quản lý sản phẩm
|--------------------------------------------------------------------------
*/
Route::get('/add-product', [ProductController::class, 'create'])->name('products.create');
Route::post('/add-product', [ProductController::class, 'store'])->name('products.store');


