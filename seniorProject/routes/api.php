<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/project','UserManagementController@storeProject');

Route::get('/users','UserManagementController@index');
Route::get('/user/students','UserManagementController@indexStudent');
Route::get('/user/teachers','UserManagementController@indexTeacher');
