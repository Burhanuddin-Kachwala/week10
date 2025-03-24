<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\User\AddressController;


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
    //checkout routes

    Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout');
    Route::get('/order/confirmation/{order}', [OrderController::class, 'confirmation'])->name('order.confirmation');
    //routes for address
    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
});


Route::get('/check-user-email', function (Request $request) {

    $exists = User::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
});

Route::get('/products', [UserController::class, 'showAll'])->name('products.all');
Route::get('/products/{product:slug}', [UserController::class, 'show'])->name('products.show');
Route::get('/categories/{category:slug}', [UserController::class, 'category'])->name('categories.show');
Route::get('/search', [UserController::class, 'search'])->name('search');



// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


