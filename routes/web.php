<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'index']);
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::get('admin/main', [MainController::class, 'index'])->name('admin');