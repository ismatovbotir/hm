<?php

use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\PartnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StockController;

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

Route::get('/stock',[StockController::class,'index']);
Route::resource('/item',ItemController::class);
Route::resource('/partner',PartnerController::class);