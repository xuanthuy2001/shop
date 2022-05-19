<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Menus\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');


Route::middleware(['auth'])->group(function () {
      Route::get('', [MainController::class, 'index']);


      Route::prefix('admin')->group(function () {
            Route::get('/', [MainController::class, 'index'])->name('admin');
            Route::get('/main', [MainController::class, 'index']);
            // menu
            Route::prefix('menus')->group(function () {
                  Route::get('/add', [MenuController::class, 'create']);
                  Route::post('/add', [MenuController::class, 'store'])->name('add');
                  Route::get('/list', [MenuController::class, 'index'])->name('list');
                  Route::get('edit/{menu}', [MenuController::class, 'show'])->name('show');
                  Route::post('edit/{menu}', [MenuController::class, 'update'])->name('update');
                  Route::DELETE('/destroy', [MenuController::class, 'destroy'])->name('destroy');
            });
            // Route::get('menu/api', [MenuController::class, 'api'])->name('menu.api');

            // product
            Route::prefix('products')->group(function () {
                  Route::get('/add', [ProductController::class, 'create']);
                  Route::post('/add', [ProductController::class, 'store'])->name('products.add');
                  Route::get('/list', [ProductController::class, 'index'])->name('products.list');
                  Route::get('edit/{menu}', [ProductController::class, 'show'])->name('products.show');
                  Route::post('edit/{menu}', [ProductController::class, 'update'])->name('products.update');
                  Route::DELETE('/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
            });

            // #Upload
            Route::post('upload/services', [UploadController::class, 'store']);
      });
});