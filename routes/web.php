<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
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

    Route::middleware("auth:admin")->group(function() {
        Route::get("/dashboard", [AdminController::class, 'index'])->name("admin.dashboard");
        Route::get("/logout", [AdminController::class, "destroy"])->name("admin.logout");

        Route::prefix('products')->group(function () {
            Route::get("/", [ProductController::class, 'index'])->name("admin.products");
            Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
            Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
            Route::get('/{product:slug}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
            Route::put('/{product}', [ProductController::class, 'update'])->name('admin.products.update');
            Route::delete('/{product}', [ProductController::class, 'delete'])->name('admin.products.destroy');
        });

        Route::prefix('authors')->group(function () {
            Route::get("/", [AuthorController::class, 'index'])->name("admin.authors");
            Route::get('/create', [AuthorController::class, 'create'])->name('admin.authors.create');
            Route::post('/', [AuthorController::class, 'store'])->name('admin.authors.store');
            Route::get('/{author:slug}/edit', [AuthorController::class, 'edit'])->name('admin.authors.edit');
            Route::put('/{author}', [AuthorController::class, 'update'])->name('admin.authors.update');
            Route::delete('/{author}', [AuthorController::class, 'delete'])->name('admin.authors.destroy');
        });

         Route::prefix('users')->group(function () {
                    Route::get("/", [UserController::class, 'index'])->name("admin.users");
                    Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
                    Route::post('/', [UserController::class, 'store'])->name('admin.users.store');
                    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
                    Route::put('/{user}', [UserController::class, 'update'])->name('admin.users.update');
                    Route::delete('/{user}', [UserController::class, 'delete'])->name('admin.users.destroy');
                });


    });

});

// Route::get("/admin/dashboard", [AdminController::class, 'index'])->name("admin.dashboard");
// 




