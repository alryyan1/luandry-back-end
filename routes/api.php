<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::post('signup', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('meals', MealController::class);
Route::apiResource('costs',\App\Http\Controllers\CostController::class);
Route::apiResource('CostCategories',\App\Http\Controllers\CostCategoryController::class);
Route::apiResource('orderMeals',\App\Http\Controllers\OrderMealsController::class);
Route::apiResource('customers',\App\Http\Controllers\CustomerController::class);

Route::get('categories',[\App\Http\Controllers\CategoryController::class,'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('orders', OrderController::class);

});
