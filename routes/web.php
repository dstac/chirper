<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

Route::get('/', [ChirpController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::resource('chirps', ChirpController::class)
    ->only(['store','edit','update','destroy']);
});


//Instead of:
// Route::post('/chirps', [ChirpController::class, 'store']);
// Route::get('/chirps/{chrip}/edit', [ChirpController::class, 'edit']);
// Route::put('/chirps/{chrip}', [ChirpController::class, 'update']);
// Route::delete('/chirps/{chrip}', [ChirpController::class, 'destroy']);

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
    
Route::post('/register', Register::class)
    ->middleware('guest');

Route::post('/login', Login::class)
    ->middleware('guest');

Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');