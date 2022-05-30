<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Menus\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController as ControllersMainController;
use App\Http\Controllers\MenuController as ControllersMenuController;
use App\Http\Controllers\ProductController as ControllersProductController;
use Illuminate\Support\Facades\Route;


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');


Route::middleware(['auth'])->group(function () {



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
                  Route::get('/add', [ProductController::class, 'create'])->name('products.add');
                  Route::post('/add', [ProductController::class, 'store']);
                  Route::get('/list', [ProductController::class, 'index'])->name('products.list');
                  Route::get('edit/{product}', [ProductController::class, 'show'])->name('products.show');
                  Route::post('edit/{product}', [ProductController::class, 'update']);
                  Route::DELETE('/destroy', [ProductController::class, 'destroy']);
            });
            // slider
            Route::prefix('sliders')->group(function () {
                  Route::get('/add', [SliderController::class, 'create'])->name('sliders.add');
                  Route::post('/add', [SliderController::class, 'store']);
                  Route::get('/list', [SliderController::class, 'index'])->name('sliders.list');
                  Route::get('edit/{product}', [SliderController::class, 'show'])->name('sliders.show');
                  Route::post('edit/{product}', [SliderController::class, 'update']);
                  Route::DELETE('/destroy', [SliderController::class, 'destroy']);
            });


            // #Upload
            Route::post('upload/services', [UploadController::class, 'store']);
      });
});

Route::get('/', [ControllersMainController::class, 'index'])->name('home');
Route::post('/services/loadProduct', [App\Http\Controllers\MainController::class, 'loadProduct'])->name('loadProduct');

Route::get('danh-muc/{id}-{slug}.html', [ControllersMenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [ControllersProductController::class, 'index']);
Route::post('add_cart', [CartController::class, 'index']);
Route::get('carts', [CartController::class, 'show']);
Route::post('update_cart', [CartController::class, 'update']);