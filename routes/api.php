<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Route to Login 
 */

Route::post('login', 'Auth\LoginController@login')->name('login');

/**
 * Route to register
 */
Route::post('register', 'Auth\RegisterController@register')->name('register');

/**
 * Routes with middleware sanctum, to authenticated users
 */
Route::group(['middleware' => ['auth:sanctum','permission']], function () {
    //* Logout
    Route::post('logout', 'Auth\LogoutController@logout')->name('logout');

    //* User 
    Route::group(['prefix' =>'users'], function () {
        Route::get('show', 'UserController@show')->name('user.showUser');
        Route::put('update', 'UserController@update')->name('user.updateUser');

        Route::get('endpoint-list', 'UserController@endpointList')->name('user.endpointList');
    });

    //* Endpoints
    Route::group(['prefix' =>'endpoints'], function () {
        Route::get('index', 'EndpointController@index')->name('endpoint.index');
        Route::post('store', 'EndpointController@store')->name('endpoint.store');
        Route::get('show/{id}', 'EndpointController@show')->name('endpoint.show');
        Route::put('update/{id}', 'EndpointController@update')->name('endpoint.update');

        Route::get('users/without-endpoint', 'EndpointController@usersWithoutEndpoint')->name('endpoint.usersWithoutEndpoint');
        
    });

    //* Permissions
    Route::group(['prefix' =>'permissions'], function () {
        Route::get('index', 'PermissionController@index')->name('permission.index');
        Route::post('store', 'PermissionController@store')->name('permission.store');
        Route::get('show/{id}', 'PermissionController@show')->name('permission.show');
        Route::put('update/{id}', 'PermissionController@update')->name('permission.update');
    });

    //* Roles
    Route::group(['prefix' =>'roles'], function () {
        Route::get('index', 'RoleController@index')->name('role.index');
        Route::post('store', 'RoleController@store')->name('role.store');
        Route::get('show/{id}', 'RoleController@show')->name('role.show');
        Route::put('update/{id}', 'RoleController@update')->name('role.update');

        /*Gestion role con usuario */
        Route::get('list-roles-user/{user_id}', 'RoleController@listRolesUser')->name('role.listRolesUser');
        Route::get('list-roles-users', 'RoleController@listRolesUsers')->name('role.listRolesUsers');
        
        Route::put('update-role-user/{user_id}', 'RoleController@updateRoleUser')->name('role.updateRoleUser');
        
        Route::put('update-role-permission/{role_id}', 'RoleController@updateRolePermission')->name('role.updateRolePermission');
        /*Gestion role con permiso */
        
    });

    
   
});




