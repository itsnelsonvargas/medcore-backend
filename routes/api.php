<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Group routes under /v1
Route::prefix('v1')->group(function () {
    
    // Public routes
    Route::post('/login', [AuthController::class, 'login']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user(); 
        });
        

        // Client Routes
        Route::prefix('clients')->group(function () {
            Route::get('/', [ClientController::class, 'index']);            
            Route::get('/{id}', [ClientController::class, 'show']);
            Route::put('/{id}', [ClientController::class, 'update']);
            Route::delete('/{id}', [ClientController::class, 'destroy']);
        });



        Route::post('/logout', [AuthController::class, 'logout']);
    });
});