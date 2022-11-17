<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ReportsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('reports/rank',[ReportsController::class,'topDistributor'])->name('rank.report');
Route::get('reports/comission',[ReportsController::class,'comission'])->name('comission.report');
Route::get('reports/comission/search',[ReportsController::class,'comission'])->name('sreach');
Route::post('get-item',[ReportsController::class,'getItem']);

