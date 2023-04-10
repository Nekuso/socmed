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
// Made with ❤️ by Nekuso
Route::get('/signup', [authController::class, 'signup'])->name('signup');
Route::post('/register', [authController::class, 'register'])->name('register');
Route::post('/signIn', [authController::class, 'signIn'])->name('signIn');

Route::group(['middleware' => ['Authcheck']], function () {
    Route::get('/', [authController::class, 'index'])->name('login');
    Route::get('/home', [homeController::class, 'index'])->name('home');
    Route::get('/users_list', [homeController::class, 'users_list'])->name('users_list');
    Route::get('/logout', [homeController::class, 'logout'])->name('logout');

    Route::get('/profile/{id}', [HomeController::class, 'profile'])->name('profile');


    Route::get('/update_user_view/{id}', [homeController::class, 'updateView'])->name('userView');
    Route::match(array('GET', 'POST'), '/update_user/{id}', [homeController::class, 'updateUser'])->name('updateUser');
    Route::post('/delete/{id}', [homeController::class, 'delete']);

    Route::match(array('GET', 'POST'), '/update_post/{id}', [homeController::class, 'updatePost'])->name('updatePost');
    Route::get('/edit_post_view/{id}', [homeController::class, 'editPostView'])->name('postView');
    Route::post('/insertPost/{post}', [homeController::class, 'insertPost']);
    Route::post('editPost/{id}', [homeController::class, 'editPost']);
    Route::post('/deletePost/{id}', [homeController::class, 'deletePost']);

    Route::post('/add_friend/{id}', [homeController::class, 'addFriend'])->name('add.friend');
    Route::post('/unfriend/{id}', [homeController::class, 'unfriend'])->name('unfriend');
});
