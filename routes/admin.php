<?php

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\FroalaImageUploadController;

    Route::prefix("admin")->group(function () {

        Route::middleware("guest:admin")->group(function () {
            Route::get("login", [AdminController::class, "create"])->name("admin.login");
            Route::post("login", [AdminController::class, "store"])->name("admin.authenticate");
        });

    Route::middleware("auth:admin")->group(function () {

        

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

        Route::prefix('static-pages')->group(function () {
            Route::get("/", [StaticPageController::class, 'index'])->name("admin.static-pages.index");
            Route::get('/create', [StaticPageController::class, 'create'])->name('admin.static-page.create');
            Route::post('/create', [StaticPageController::class, 'store'])->name('admin.static-page.store');
            Route::get('/{staticPage:slug}/edit', [StaticPageController::class, 'edit'])->name('admin.static-page.edit');
            Route::put('/{staticPage:slug}', [StaticPageController::class, 'update'])->name('admin.static-page.update');  // Corrected this line
            Route::delete('/{staticPage:slug}', [StaticPageController::class, 'delete'])->name('admin.static-pages.destroy');
            //Route::post('/upload-image', [StaticPageController::class, 'uploadImage'])->name('admin.static-pages.uploadImage');
        });


        Route::prefix('authors')->group(function () {
            Route::get("/", [AuthorController::class, 'index'])->name("admin.authors");
            Route::get('/create', [AuthorController::class, 'create'])->name('admin.authors.create');
            Route::post('/', [AuthorController::class, 'store'])->name('admin.authors.store');
            Route::get('/{author:slug}/edit', [AuthorController::class, 'edit'])->name('admin.authors.edit');
            Route::put('/{author}', [AuthorController::class, 'update'])->name('admin.authors.update');
            Route::delete('/{author}', [AuthorController::class, 'delete'])->name('admin.authors.destroy');
        });

        Route::prefix('categories')->group(function () {
            Route::get("/", [CategoryController::class, 'index'])->name("admin.categories");
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
            Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
            Route::get('/{category:slug}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
            Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.categories.destroy');
        });

        Route::prefix('users')->group(function () {
            Route::get("/", [UserController::class, 'index'])->name("admin.users");
            Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('/', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('admin.users.update');
            Route::delete('/{user}', [UserController::class, 'delete'])->name('admin.users.destroy');
        });
        //testing for update order status
        Route::post('/update-order-status', [OrderController::class, 'updateStatus'])->name('update-order-status');

        Route::get('/admin/orders/details', [OrderController::class, 'getOrderDetails'])->name('admin.orders.details');
    });
});
Route::get('/check-author-name', function (Request $request) {
    $exists = Author::where('name', $request->name)->exists();
    return response()->json(['exists' => $exists]);
});
Route::get('/check-category-name', function (Request $request) {

    $exists = Category::where('name', $request->name)->exists();
    return response()->json(['exists' => $exists]);
});



