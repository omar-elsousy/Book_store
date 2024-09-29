<?php

use App\Http\Controllers\apicontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/notvalid',function(){
    return ['message'=>'not valid request','status'=>'fail'];
});

Route::middleware('isapiuser')->group(function(){
    Route::get('/books/list',[apicontroller::class,'books']);
});

Route::middleware('isapiadmin')->group(function(){
    Route::get('/users/list',[apicontroller::class,'users']);

});


Route::post('/users/register',[apicontroller::class,'register']);
Route::post('/users/login',[apicontroller::class,'login']);
