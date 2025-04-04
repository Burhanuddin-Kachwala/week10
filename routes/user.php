<?php

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\User\AddressController;
use App\Models\Author;

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

    //displaying user details
    Route::get('/display/user/details', [UserController::class, 'showDetails'])->name('display-user-details');

    

    //edit user details
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
    //edit address
    Route::put('/address', [UserController::class, 'updateAddress'])->name('user.address.update');
});


Route::get('/check-user-email', function (Request $request) {

    $exists = User::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
});

Route::get('/products', [UserController::class, 'showAll'])->name('products.all');
Route::get('/products/{product:slug}', [UserController::class, 'show'])->name('products.show');
Route::get('/categories/{category:slug}', [UserController::class, 'category'])->name('categories.show');

//search page route
Route::get('/search', [UserController::class, 'search'])->name('search');


//testing new feature of search suggestion 
Route::get('/searchSuggest', function (Request $request) {
    $query = $request->get('q');

    // Get Products based on the query
    $productResults = Product::where('name', 'LIKE', "%{$query}%")
        ->take(5)  // Limit results to 5
        ->get();

    // Get Authors based on the query
    $authorResults = Author::where('name', 'LIKE', "%{$query}%")
        ->take(5)  // Limit results to 5
        ->get();

    // Merge the two collections into a single collection
    $results = $productResults->merge($authorResults);

    // Return the results as JSON
    return response()->json($results);
});



// Cart routes
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'addToCart'])->name('add');
    Route::post('/update', [CartController::class, 'updateCart'])->name('update');
    Route::post('/remove', [CartController::class, 'removeFromCart'])->name('remove');
    Route::post('/clear', [CartController::class, 'clearCart'])->name('clear');
});




//testing mail
Route::get('/preview-email', function () {
    return new App\Mail\UserCreated(App\Models\User::first());
});



