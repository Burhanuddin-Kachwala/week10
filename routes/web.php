<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Admin\ProductController;
Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::get('/product', function () {
    return view('product');
});
Route::get('/cart', function () {
    return view('/cart');
});



//admin routes
Route::prefix("admin")->group(function() {

    Route::middleware("guest:admin")->group(function() {
        Route::get("login", [AdminController::class, "create"])->name("admin.login");
        Route::post("login", [AdminController::class, "store"])->name("admin.authenticate");
    });

    Route::middleware("web", "auth:admin")->group(function() {
        Route::get("/dashboard", [AdminController::class, 'index'])->name("admin.dashboard");
        Route::get("/products", [ProductController::class, 'index'])->name("admin.products");
        Route::get("/logout", [AdminController::class, "destroy"])->name("admin.logout");
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });

});

// Route::get("/admin/dashboard", [AdminController::class, 'index'])->name("admin.dashboard");
// 




