<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

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
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logoutApi']);

//Route::get('/course',[AuthController::class,'index']);
Route::get('/course',[AuthController::class,'index'])->middleware('auth:api');
Route::get('/course/{id}',[AuthController::class,'show'])->middleware('auth:api');
Route::patch('/course/{id}',[AuthController::class,'update'])->middleware('auth:api');
Route::post('/course/',[AuthController::class,'store'])->middleware('auth:api');
Route::delete('/course/{id}',[AuthController::class,'destroy'])->middleware('auth:api');

//Orders
Route::post('course/{id}/order',[OrderController::class,'store'])->middleware('auth:api');
Route::get('/orders',[OrderController::class,'list'])->middleware('auth:api');
Route::post('/course/{id}',[AuthController::class,'create_order'])->middleware('auth:api');

//Route::group(['prefix' => 'auth'], function(){
//    Route::post('login', [AuthController::class,'login']);
//    Route::post('signup', [AuthController::class,'signup']);
//});
//
//Route::group(['middleware' => 'auth:api'], function () {
//    Route::get('user', [AuthController::class,'user']);
//    Route::get('logout', [AuthController::class,'logout']);
//});



