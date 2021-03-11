<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RubricsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UsersController;

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
Route::post('/register',[AuthController::class,'register']); //Creating new User (Author)
Route::post('/login',[AuthController::class,'login']);

//Attaching middleware to restrict access from unauthorized users

Route::group(['middleware'=>'auth:api'], function (){
    Route::post('/logout',[AuthController::class,'logoutApi']);
    //Displaying all rubrics
    Route::get('/rubrics',[RubricsController::class,'index']);
    //Creating new Rubric
    Route::post('/rubrics/new',[RubricsController::class,'store']);
    //List of all created news
    Route::get('/news',[NewsController::class,'index']);
    //Showing specific news by id
    Route::get('/news/{id}',[NewsController::class,'show']);
    //Creating news
    Route::post('/news/create',[NewsController::class,'store']);
    //List of all users(authors)
    Route::get('/users',[UsersController::class,'index']);
    //Searching news' "text" column (same logic will be applied for searching other columns)
    Route::get('/search/text/{text}',[NewsController::class,'search']);
    Route::get('/search/heading/{heading}',[NewsController::class,'search_heading']);
    Route::get('/search/anons/{anons}',[NewsController::class,'search_anons']);
    //Displaying only news with specific rubric
    Route::get('/rubric/{rubric_id}',[NewsController::class,'search_rubric']);
    //Displaying author's posts
    Route::get('/author/{user_id}',[NewsController::class,'search_author']);
    //Showing author's details
    Route::get('/user/{id}',[UsersController::class,'show']);
    //Uploading user's avatar, by default avatar is null
   Route::post('/user/avatar/{id}',[UsersController::class,'upload']);


});
