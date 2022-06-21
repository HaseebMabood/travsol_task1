<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AgentNewController;
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


//Spatie Middleware for route protection
Route::group(['middleware' => ['role:admin']], function () {
  
            // Role controller
        Route::resource('/roles', RoleController::class);


        // Permission controller
        Route::resource('/permissions', PermissionController::class);

        //Assign permission to role

        Route::post('/roles/{id}/permission', [RoleController::class, 'givePermission'])->name('roles.permission');

        //revoke/delete permission that assigned to role
        Route::delete('/roles/{id}/permission/{id2}', [RoleController::class, 'revokePermission'])->name('permission.revoke');


        // Assign role to user
        Route::get('/assign_role_to_user/{id}', [RoleController::class, 'assign_role_to_user']);

        Route::post('/role_asssigned_to_user/{id}', [RoleController::class, 'role_asssigned_to_user']);


        //revoke/delete role that assigned to role
        Route::delete('/user/{id}/role/{id2}', [RoleController::class, 'revokeRole'])->name('role.revoke');


        // Agencies resource
        Route::resource('/agencies', AgencyController::class);


        //here is all agents created by managers, show to Admin
        Route::get('/agents_all', [AdminController::class, 'agents_all']);

});




        // This route is accessable only to manager
    Route::group(['middleware' => ['role:manager']], function () {
                // Agent resource ....Agent Crud created by manager
                Route::resource('/agents_new', AgentNewController::class);
    });

    //The following routes is accessable to everyone

    Route::get('/my-profile', [UserController::class, 'my_profile']);

    Route::put('/profile-update/{id}', [UserController::class, 'update_profile']);



    



    // Manager resource ....Here we will show the Agency related to corressponding manager../Specific agency accessable by their relavant manager
    Route::resource('/agency', ManagerController::class);