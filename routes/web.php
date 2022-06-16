<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\PermissionController;

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
  
    return view('auth.login');
});


// Route::get('/myProfile', function () {
  
//     return view('admin.profile');
// });

// Route::get('/table', function () {
  
//     return view('admin.users_table');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', AdminController::class);

// Role controller
Route::resource('/roles', RoleController::class);

// Permission controller
Route::resource('/permissions', PermissionController::class);




Route::get('/my-profile', [UserController::class, 'my_profile']);

Route::put('/profile-update/{id}', [UserController::class, 'update_profile']);