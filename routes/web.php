<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Menus\MenuController;
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
            // product
            Route::prefix('products')->group(function () {
                  Route::get('/add', [MenuController::class, 'create']);
                  Route::post('/add', [MenuController::class, 'store'])->name('add');
                  Route::get('/list', [MenuController::class, 'index'])->name('list');
                  Route::get('edit/{menu}', [MenuController::class, 'show'])->name('show');
                  Route::post('edit/{menu}', [MenuController::class, 'update'])->name('update');
                  Route::DELETE('/destroy', [MenuController::class, 'destroy'])->name('destroy');
            });
      });
});