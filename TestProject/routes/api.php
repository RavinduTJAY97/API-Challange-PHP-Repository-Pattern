<?php

use App\Http\Controllers\VacancyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/import/csv',[VacancyController::class,'importCsV'])->name('csv.import');
Route::get('/vacancy/{id}',[VacancyController::class,'getVacancyById'])->name('vacancy.by.id');
Route::get('/vacancy/{country}/{city}',[VacancyController::class,'getVacancyByLocation'])->name('vacancy.by.location');
Route::get('/most-interesting/positions',[VacancyController::class,'mostInterestingPositions'])->name('most.interesting.positions');
