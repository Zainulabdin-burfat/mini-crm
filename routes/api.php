<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Route::post('login', 'LoginController@login');

// Post API
Route::get('posts', [PostController::class, 'index']);
Route::group(['prefix' => 'post'], function () {
	Route::post('add', [PostController::class, 'add']);
	Route::get('edit/{id}', [PostController::class, 'edit']);
	Route::post('update/{id}', [PostController::class, 'update']);
	Route::delete('delete/{id}', [PostController::class, 'delete']);
});


// Company API
Route::get('companies/{page?}', [CompanyController::class, 'index']);
Route::group(['prefix' => 'company'], function () {
	Route::post('add', "CompanyController@add");
	Route::get('edit/{id}', [CompanyController::class, 'edit']);
	Route::post('update/{id}', [CompanyController::class, 'update']);
	Route::delete('delete/{id}', "CompanyController@destroy");
});

// Employee API
Route::get('employees', [EmployeeController::class, 'index']);
Route::group(['prefix' => 'employee'], function () {
	Route::post('/add', "EmployeeController@add");
	Route::get('edit/{id}', "EmployeeController@edit");
	Route::put('update/{id}', "EmployeeController@update");
	Route::delete('delete/{id}', "EmployeeController@destroy");
});

