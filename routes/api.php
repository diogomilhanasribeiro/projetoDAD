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
Route::/*middleware('auth:api')->*/post('changePassword', 'LoginControllerAPI@changePassword');

Route::/*middleware('auth:api')-> TODO */post('forgotPassword', 'LoginControllerAPI@forgotPassword');

Route::/*middleware('auth:api')-> TODO */post('adminEmail', 'LoginControllerAPI@setAdminEmail');

Route::/*middleware('auth:api')-> TODO */post('platEmail', 'LoginControllerAPI@changePassword');


//Admin Forgot Password
/*
Route::post('forgotPassword/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('forgotPassword/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin..password.request');

Route::post('forgotPassword/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('forgotPassword/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
*/


Route::get('users/emailavailable', 'UserControllerAPI@emailAvailable');
Route::get('users/{id}', 'UserControllerAPI@getUser');
Route::post('users', 'UserControllerAPI@store');
Route::put('users/{id}', 'UserControllerAPI@update');
Route::delete('users/{id}', 'UserControllerAPI@delete');