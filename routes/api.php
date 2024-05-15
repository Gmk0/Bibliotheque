<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\TravailController;
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

Route::controller(authController::class)->group(function () {

    Route::post('/auth/login', 'login');
    Route::post('/auth/register', 'create');
});

Route::controller(TravailController::class)->group(function () {

    Route::get('/allTravail', 'getAllTravail');
    Route::get('/travailLast', 'lastPubilcation');
    Route::get('/domainesLast', 'lasTdomaines');
    Route::get('/alldomaine', 'allDomaines');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});