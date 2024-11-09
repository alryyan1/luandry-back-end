<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/orders',[\App\Http\Controllers\PDFController::class,'orders']);

//users
Route::get('/users',[UserController::class,'create']);
Route::get('/users/{userId}',[UserController::class,'destroy']);
Route::post('/createUSer',[UserController::class,'store']);
Route::post('/updateUser',[UserController::class,'update']);

//export order to excel
Route::get('/exportExcel',[OrderController::class,'exportExcel']);

//items
Route::get('/items',[ItemController::class,'index']);
Route::get('/items/{itemId}',[ItemController::class,'destroy']);
Route::post('/createItem',[ItemController::class,'store']);
Route::post('/updateItem',[ItemController::class,'update']);
