<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
Route::get('/stocks', [\App\Http\Controllers\StocksController::class, 'index']);
Route::get('/sales', [\App\Http\Controllers\SalesController::class, 'index']);
Route::get('/incomes', [\App\Http\Controllers\IncomesController::class, 'index']);
Route::get('/orders', [\App\Http\Controllers\OrdersController::class, 'index']);
