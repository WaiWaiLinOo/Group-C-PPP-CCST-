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
use App\Http\Controllers\ContactController;
use App\Models\User;
use App\Http\Controllers\HighchartController;
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
//    return view('frontend.app');
//});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('user/register', [RegisterController::class, 'showRegistrationView'])->name('register');
Route::post('user/register/confirm', [RegisterController::class, 'create'])->name('registeruser');
Route::group(['middleware' => ['auth']], function () {
    //Route::get('/home', [PostController::class, 'postView'])->name('homeside');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/detail/{id}', [PostController::class, 'postDetail'])->name('postdetail');
    Route::get('/detail/{id}', [PostController::class, 'postDetails'])->name('postdetail');
    Route::get('/aboutus', [HomeController::class, 'aboutUs'])->name('aboutUs');
    Route::get('/contactus', [HomeController::class, 'contactUs'])->name('contactUs');
    Route::resource('roles', RoleController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('posts', PostController::class);
    Route::resource('contact',ContactController::class);
    // Category resource controller
    Route::resource('/categories', CategoryController::class);
    Route::delete('user/delete/{id}', [CustomerController::class, 'destroy'])->name('destroyUser');
    Route::get('user/profile/{id}', [CustomerController::class, 'profileView'])->name('profileView');
    Route::put('user/profile_update/{id}', [CustomerController::class, 'profileUpdate'])->name('profileUpdate');
    Route::get('/search', [CustomerController::class, 'searchUser'])->name('customer.index');

    Route::get('profileshow/{id}', [CustomerController::class, 'profileshows'])->name('profileshows');
    Route::post('import', [PostController::class, 'import'])->name('import');
    Route::get('export', [PostController::class, 'export'])->name('export');
    //for mail
    Route::get('/mail', [CustomerController::class, 'showMailForm'])->name('showMailForm');
    Route::post('/mail', [CustomerController::class, 'postMailForm'])->name('postMailForm');
    Route::get('/exportpdf', [CustomerController::class, 'generatePDF'])->name('exportpdf');
    //graph
    Route::get('/graph', [HighchartController::class, 'handleChart']);
    Route::get('/contactshow', [ContactController::class , 'show'])->name('contact.show');
    Route::post('/contactdata', [ContactController::class , 'store'])->name('contact.store');
    Route::get('/managecontact',[ContactController::class,'index'])->name('contact.index');

    Route::get('/postByCategory/{id}', [PostController::class, 'postByCategoryId'])->name('postByCategoryId');
});


Route::post('/comments/add', [CommentController::class, 'create']);
Route::get('/comments/delete/{id}', [CommentController::class, 'delete'])->name('commentDelete');
