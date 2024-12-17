<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\KelasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::prefix('/my')->group(function () {
    Route::put('/change-pass', [AuthController::class, 'changePass']);
    Route::put('/change-username', [AuthController::class, 'changeUsername']);
});

Route::prefix('/kelas')->group(function () {
    Route::post('/{kelas_id}', [KelasController::class, 'gabungKelas']);
    Route::delete('/{kelas_id}', [KelasController::class, 'keluarKelas']);
});

Route::prefix('/course')->group(function () {
    Route::put('/{course_id}/rate', [CourseController::class, 'rate']);
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
