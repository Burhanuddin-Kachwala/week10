<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\RegisterUserController;


Route::get('/', function () {
    return view('user.index');
})->name('homepage');

Route::middleware(['guest:user'])->group(function () {
    Route::get('/register', [RegisterUserController::class, 'create']);
    Route::post('/register', [RegisterUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware(['auth:user'])->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
});


Route::get('/check-user-email', function (Request $request) {

    $exists = User::where('name', $request->name)->exists();
    return response()->json(['exists' => $exists]);
});

Route::get('/products/{product:slug}', [UserController::class, 'show'])->name('products.show');
Route::get('/categories/{category:slug}', [UserController::class, 'category'])->name('categories.show');
Route::get('/search', [UserController::class, 'search'])->name('search');

Route::get('/cart', function () {
    return view('/cart');
});

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
