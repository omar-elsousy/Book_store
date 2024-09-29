<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\notecontroller;
use App\Http\Controllers\usercontroller;
use App\Models\note;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/notauth', function () {
    return "you do not have permission to visit this page";
});
//users
Route::get('/users/register',[usercontroller::class,'register']);
Route::post('/users/handle_register',[usercontroller::class,'handle_register']);
Route::get('/users/login',[usercontroller::class,'login']);
Route::post('/users/handle_login',[usercontroller::class,'handle_login']);

//loggd user middleware
Route::middleware('is_logged_user')->group(function(){
    //books
    Route::get('/books',[BookController::class,'books']);
    //users
    Route::get('/users/logout',[usercontroller::class,'logout']);
    Route::get('/users/notes',[notecontroller::class,'notes']);
    Route::post('/users/add_notes',[notecontroller::class,'add_notes']);
});
//admin middleware
Route::middleware('is_admin')->group(function(){
    //books
Route::get('/books/create',[BookController::class,'create']);
Route::post('/books/store',[BookController::class,'store']);
Route::get('/books/show/{id}',[BookController::class,'show']);
Route::get('/books/edit/{id}',[BookController::class,'edit']);
Route::post('/books/update/{id}',[BookController::class,'update']);
Route::get('/books/delete/{id}',[BookController::class,'delete']);
Route::get('/categories/list',[categorycontroller::class,'list']);
Route::post('/categories/add_categories',[categorycontroller::class,'add_categories']);
});


