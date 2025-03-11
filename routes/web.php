<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;

Route::get('/', function () {
    return view('index');
});
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/register', [RegisterUserController::class, 'create']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::get('/product', function () {
    return view('product');
});

Route::get('/admin', function () {
    return view('/admin/auth/login');
});
Route::get('/cart', function () {
    return view('/cart');
});
  