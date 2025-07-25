<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\SellController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('item',ItemController::class);
Route::resource('shop',ShopController::class);
Route::resource('price',PriceController::class);
Route::resource('partner',PartnerController::class);
Route::resource('category',CategoryController::class);
Route::resource('item',ItemController::class);
Route::resource('stock',StockController::class);
Route::resource('sell',SellController::class);


