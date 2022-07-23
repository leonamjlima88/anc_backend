<?php

use App\Source\Modules\Auth\Adapter\Controller\AuthController;
use Illuminate\Support\Facades\Route;

/**
 * Auth (Autenticação)
 */
Route::post('auth/login', [AuthController::class, 'login']);
Route::group([
  'middleware' => [
    'jwt',
  ],
  'prefix' => 'auth',
  ], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name("auth-logout.index");
    Route::post('refresh', [AuthController::class, 'refresh'])->name("auth-refresh.index");
    Route::post('me', [AuthController::class, 'me'])->name("auth-me.index");
  }
);