<?php

use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ReportController;
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

Route::get('/report',[ReportController::class,'index'])->name('report.dashboard');
Route::get('/report/item',[ReportController::class,'item'])->name('report.item');
Route::get('/report/stock',[ReportController::class,'stock'])->name('report.stock');
Route::get('/report/sell',[ReportController::class,'sell'])->name('report.sell');

