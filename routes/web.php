<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routing untuk halaman user information
Route::get('/user-info', [UserController::class, 'createUserInfo'])
    ->middleware('auth')
    ->name('user.info.create');

Route::post('/user-info', [UserController::class, 'storeUserInfo'])
    ->middleware('auth')
    ->name('user.info.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk pengajuan cuti
    Route::post('/leave', [LeaveController::class, 'store'])->name('leave.store');
});

Route::middleware('guest')->group(function () {
  Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
  Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store')
      ->middleware('guest');
});


require __DIR__.'/auth.php';
