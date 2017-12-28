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

//Login
Route::post('login', 'LoginControllerAPI@login');

//Logout
Route::middleware('auth:api')->post('logout', 'LoginControllerAPI@logout');

Route::/*middleware(['auth:api', 'admin'])->*/get('users', 'UserControllerAPI@getUsers');

//Change Password
Route::/*middleware('auth:api')->*/post('password', 'LoginControllerAPI@changePassword');

//Reset Password
Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin..password.request');
Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('users/emailavailable', 'UserControllerAPI@emailAvailable');
Route::get('users/{id}', 'UserControllerAPI@getUser');
Route::post('users', 'UserControllerAPI@store');
Route::put('users/{id}', 'UserControllerAPI@update');
Route::delete('users/{id}', 'UserControllerAPI@delete');