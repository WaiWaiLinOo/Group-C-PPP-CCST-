<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\Role\RoleController;
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

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('user/register', [RegisterController::class, 'showRegistrationView'])->name('register');
Route::post('user/register/confirm', [RegisterController::class, 'create'])->name('registeruser');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('customers', CustomerController::class);
    //Route::get('user/showuserlist', [CustomerController::class, 'index'])->name('customerView');
    //Route::get('user/edit/{id}', [CustomerController::class, 'userEditView'])->name('user_edit_view');
    Route::post('user/role_update/{id}', [CustomerController::class, 'userRoleUpdate'])->name('user_role_update');
    //destroy user
    Route::delete('user/delete/{id}', [CustomerController::class, 'destroy'])->name('destroyUser');
});
