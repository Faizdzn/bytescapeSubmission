<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::prefix('/my')->group(function () {
    Route::post('/change-pass', [AuthController::class, 'changePass']);
    Route::post('/change-username', [AuthController::class, 'changeUsername']);
});



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
