<?php

use App\Http\Controllers\postsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/',[postsController::class,'home']);
Route::get('posts',[postsController::class,'index']);
Route::get('posts/search',[postsController::class,'search']);
Route::get('posts/create',[postsController::class,'create']);
Route::get('posts/{id}/edit',[postsController::class,'edit']);
Route::post('posts',[postsController::class,'store']);
Route::delete('posts/{id}',[postsController::class,'destroy']);
Route::put('posts/{id}',[postsController::class,'update']);
Route::get('posts/{id}',[postsController::class,'show']);

Route::resource('users',UserController::class);