<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClubController;
use App\Http\Controllers\Api\JugadorController;
use App\Http\Controllers\Api\LigaController;

Route::apiResource('clubs', ClubController::class);
Route::apiResource('jugadores', JugadorController::class);
Route::apiResource('ligas', LigaController::class);