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

            Route::prefix('menus')->group(function () {
                  Route::get('/add', [MenuController::class, 'create']);
                  Route::post('/add', [MenuController::class, 'store'])->name('add');
            });
      });
});