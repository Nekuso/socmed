<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;

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

Route::get('/signup', [authController::class, 'signup'])->name('signup');
Route::post('/register', [authController::class, 'register'])->name('register');
Route::post('/signIn', [authController::class, 'signIn'])->name('signIn');

Route::group(['middleware' => ['Authcheck']], function () {
    Route::get('/', [authController::class, 'index'])->name('login');
    Route::get('/home', [homeController::class, 'index'])->name('home');
    Route::get('/logout', [homeController::class, 'logout'])->name('logout');
    Route::get('/update_user_view/{id}', [homeController::class, 'updateView'])->name('userView');
    // Route::match(['GET', 'POST'], '/update_user/{id}', [homeController::class, 'updateUser'])->name('updateUser');
    Route::match(array('GET', 'POST'), '/update_user/{id}', [homeController::class, 'updateUser'])->name('updateUser');
});
