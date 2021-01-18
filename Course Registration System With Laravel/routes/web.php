<?php

use Illuminate\Support\Facades\Route;
use App\Models\Enrollment;

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
    return view('welcome');
});

Auth::routes([
    'register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/create_course',[App\Http\Controllers\AdminController::class, 'create_course']);
Route::post('/admin/create_course',[App\Http\Controllers\AdminController::class, 'store']);
Route::get('/admin/courses',[App\Http\Controllers\AdminController::class,'view']);
Route::get('/admin/students_register',[App\Http\Controllers\AdminController::class,'register']);
Route::post('/admin/students_register',[App\Http\Controllers\AdminController::class,'create']);
Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'view']);
Route::get('/user/register',[App\Http\Controllers\UserController::class, 'enroll']);
Route::post('/user/register',[App\Http\Controllers\UserController::class, 'store']);
Route::get('/user/history/',[App\Http\Controllers\UserController::class, 'history']);
Route::get('/admin/students',[App\Http\Controllers\AdminController::class,'list']);
Route::get('/admin/history',[App\Http\Controllers\AdminController::class, 'history']);
Route::get('/admin/delete/{id}',[App\Http\Controllers\AdminController::class, 'destroy']);
Route::get('/admin/update/{id}',[App\Http\Controllers\AdminController::class, 'show']);
Route::post('/admin/students/',[App\Http\Controllers\AdminController::class, 'update']);

Route::get('/admin/courses/delete/{id}',[App\Http\Controllers\AdminController::class,'destroy_course']);
Route::get('/admin/courses/edit/{id}',[App\Http\Controllers\AdminController::class,'view_courses']);
Route::post('/admin/courses', [App\Http\Controllers\AdminController::class,'edit_course']);





