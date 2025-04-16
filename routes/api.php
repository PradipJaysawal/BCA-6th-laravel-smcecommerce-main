<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//category
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categoryproduct/{id}',[CategoryController::class,'categoryproduct']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/category/store',[CategoryController::class,'store']);
    Route::put('/category/update/{id}',[CategoryController::class,'update']);
    Route::delete('/category/delete/',[CategoryController::class,'destory']);

        //carts
    Route::get('/cart',[CartController::class,'index']);
    Route::post('/cart/store',[CartController::class,'store']);
    Route::get('/cart/destroy/{id}',[CartController::class,'destroy']);


});

//product
Route::get('/latestproduct',[ProductController::class,'latest']);
Route::get('/viewproduct/{id}',[ProductController::class,'viewproduct']);

Route::post('/product/store',[ProductController::class,'store']);


//Login
Route::post('/login',[LoginController::class,'login']);

