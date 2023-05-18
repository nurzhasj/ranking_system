<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Ranking\Domains\RankingModule\Controllers\NotificationController;
use Ranking\Domains\RankingModule\Controllers\UserController;

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

Route::post('/users/addToRank', [UserController::class, 'addToRankings'])->name('create');

Route::post('/notifications/send', [NotificationController::class, 'send'])->name('send');
