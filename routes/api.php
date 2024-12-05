<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RequestedChildMealController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SettingsController;
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
Route::post('RequestedChild/{orderMeal}',[RequestedChildMealController::class,'store']);
Route::patch('RequestedChild/{requestedChildMeal}',[RequestedChildMealController::class,'update']);
Route::get('ordersInfoGraphic',[\App\Http\Controllers\OrderMealsController::class,'ordersInfoGraphic']);
Route::apiResource('customers',\App\Http\Controllers\CustomerController::class);
Route::apiResource('mealReservations',\App\Http\Controllers\CustomerController::class);
Route::get('info',[\App\Http\Controllers\CustomerController::class,'info']);
Route::apiResource('reservations', ReservationController::class);
Route::apiResource('childMeals', \App\Http\Controllers\ChildMealController::class);
Route::post('settings',[SettingsController::class,'update']);
Route::get('settings',[SettingsController::class,'index']);
Route::get('services',[\App\Http\Controllers\ServiceController::class,'index']);
Route::post('services',[\App\Http\Controllers\ServiceController::class,'store']);
Route::post('defineServices/{meal}',[\App\Http\Controllers\ServiceController::class,'defineServices']);
Route::get('categories',[\App\Http\Controllers\CategoryController::class,'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('orders', OrderController::class);

});
Route::post('orderConfirmed/{order}',[OrderController::class,'orderConfirmed']);
Route::post('orders/pagination/{page}',[OrderController::class,'pagination']);

Route::get('/printSale',[\App\Http\Controllers\PDFController::class,'printSale']);
Route::get('orderMealsStats',[\App\Http\Controllers\OrderController::class,'orderMealsStats']);
Route::post('send/{order}',[\App\Http\Controllers\OrderController::class,'send']);
Route::post('sendMsg/{order}',[\App\Http\Controllers\OrderController::class,'sendMsg']);
Route::post('deposits',[\App\Http\Controllers\DepositController::class,'store']);
