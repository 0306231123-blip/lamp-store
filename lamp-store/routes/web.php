<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('user.index');
});
Route::get('/account', function () {
    return view('user.account');
});
Route::get('/checkout', function () {
    return view('user.checkout');
});

Route::get('/contact', function () {
    return view('user.contact');
});
Route::post('/contact', function () {
    return view('user.contact');
});

Route::get('/login', function () {
    return view('user.login');
});
Route::get('/product', function () {
    return view('user.product');
});
Route::get('/single', function () {
    return view('user.single');
});
Route::get('/typo', function () {
    return view('user.typo');
});

Route::get('/layout', function () {
    return view('layout.layout');
});

Route::get('/blank', function () {
    return view('admin.blank');
});

Route::get('/buttons', function () {
    return view('admin.buttons');
});

Route::get('/flot', function () {
    return view('admin.flot');
});

Route::get('/forms', function () {
    return view('admin.forms');
});

Route::get('/grid', function () {
    return view('admin.grid');
});
Route::get('/icons', function () {
    return view('admin.icons');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/login', function () {
    return view('admin.login');
});
Route::get('/morris', function () {
    return view('admin.morris');
});
Route::get('/notifications', function () {
    return view('admin.notifications');
});
Route::get('/panels', function () {
    return view('admin.panels-wells');
});
Route::get('/tables', function () {
    return view('admin.tables');
});
Route::get('/typography', function () {
    return view('admin.typography');
});
Route::get('/Add', function () {
    return view('admin.add_product');
});
//ktr đăng nhập 

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Trang login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Trang dashboard admin – yêu cầu đăng nhập
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');

// Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\ProductController;

Route::get('/add-product', [ProductController::class, 'create'])->name('products.create');
Route::post('/add-product', [ProductController::class, 'store'])->name('products.store');

use App\Http\Controllers\SanPhamController;

Route::get('/admin/sanpham', [SanPhamController::class, 'index'])->name('sanpham.index');
Route::post('/admin/sanpham', [SanPhamController::class, 'store'])->name('sanpham.store');




