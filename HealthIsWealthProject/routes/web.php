<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\category\CategoryController;
use App\Models\User;
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
//
//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('user/register', [RegisterController::class, 'showRegistrationView'])->name('register');
Route::post('user/register/confirm', [RegisterController::class, 'create'])->name('registeruser');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [PostController::class, 'postView'])->name('homeside');
    Route::get('/detail/{id}', [PostController::class , 'postDetail'])->name('postdetail');
    Route::get('/aboutus', [HomeController::class , 'aboutUs'])->name('aboutUs');
    Route::get('/contactus', [HomeController::class , 'contactUs'])->name('contactUs');
    Route::resource('roles', RoleController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('posts', PostController::class);
    Route::delete('user/delete/{id}', [CustomerController::class, 'destroy'])->name('destroyUser');
    Route::get('user/profile/{id}', [CustomerController::class,'profileView'])->name('profileView');
    Route::put('user/profile_update/{id}', [CustomerController::class,'profileUpdate'])->name('profileUpdate');
    Route::get('profileshow/{id}', [CustomerController::class , 'profileshows'])->name('profileshows');
});

Route::post('/comments/add', [CommentController::class, 'create']);
Route::get('/comments/delete/{id}', [CommentController::class,'delete'])->name('commentDelete');

// Category resource controller
Route::resource('/categories', CategoryController::class);
