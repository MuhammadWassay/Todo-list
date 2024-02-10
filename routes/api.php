<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', 'AuthController@register');
Route::post('/verify', 'AuthController@verify');
Route::post('/login', 'AuthController@login');
Route::middleware('auth:sanctum')->post('/logout', 'AuthController@logout');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/todos', 'TodoController@index');
    Route::get('/todos/search', 'TodoController@search');
    Route::post('/todos', 'TodoController@store');
    Route::get('/todos/{id}', 'TodoController@show');
    Route::put('/todos/{id}', 'TodoController@update');
    Route::delete('/todos/{id}', 'TodoController@destroy');
});
