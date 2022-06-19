<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\LoginGithubController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('book', BookController::class)->middleware(['auth']);

Route::get('/auth/redirect',[LoginGithubController::class,'redirectToProvider'])->name('github_redirect');

Route::get('/auth/callback',[LoginGithubController::class,'handleCallbackProvider']);


Route::group(['middleware' => ['auth']], function() {
    Route::view('product', 'product')->name('product');
    Route::view('brand', 'brand')->name('brand');
    Route::view('category', 'category')->name('category');

    /*Role Permission*/
    Route::resource('user', UserController::class)->middleware('can:brand');
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
});
