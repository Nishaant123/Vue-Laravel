<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelfFormController;
use App\Http\Controllers\UserServerSideController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Vue Api Routes

Route::post('post',[SelfFormController::class,'store']);
Route::get('get', [SelfFormController::class, 'index']);
Route::delete('employee/{id}/delete', [SelfFormController::class, 'destroy']);
Route::get('employee/{id}/edit', [SelfFormController::class, 'edit']);
Route::post('employee/{id}/update', [SelfFormController::class, 'update']);


//Server side datatable
Route::get('/users',[UserServerSideController::class,'get'])->name('users');