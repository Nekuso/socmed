<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [authController::class, 'index'])->name('login');
Route::get('/signup', [authController::class, 'signup'])->name('signup');
Route::get('/home', [authController::class, 'home'])->name('home');

Route::post('/register', [authController::class, 'register'])->name('register');
Route::post('/logmein', [authController::class, 'logmein'])->name('logmein');



