<?php

use App\Exceptions\MainException;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\test;
use App\Http\Controllers\test2;
use App\Utilities\Jwt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.main');
});

Route::get('/login', function () {
    if(request()->cookie('edu-token')) {
        return redirect('/my/dashboard');
    }

    return view('page.auth.login', [
        'c' => dd(request()->cookie())
    ]);
});

Route::get('/register', function () {
    return view('page.auth.register');
});

Route::prefix('/my')->group(function () {
    Route::get('/dashboard', function () {
        return view('page.my.dashboard');
    });

    Route::get('/settings', function () {
        return view('page.my.settings');
    });
});

Route::prefix('/kelas')->group(function () {
    Route::get('/', [KelasController::class, 'index']);

    Route::get('/{id}', [KelasController::class, 'show']);
});

Route::prefix('/course')->group(function () {
    Route::get('/', [CourseController::class, 'index']);

    Route::get('/{id}', [CourseController::class, 'show']);
});

Route::get('/test/{id}', function ($id) {
    return response()->json(array(
        'hashed' => Hash::make($id),
        'value' => intval($id)
    ));
});

// Route::get('/test1/{arg1}/{arg2}', [test::class, 'show']);
Route::prefix('/test1')->group(function () {
    Route::get('/{arg1}/{arg2}', [test::class, 'show']);
});

Route::get('/test2/{id}', [test2::class, 'update']);

Route::get('/access/{key}', function($key) {
    if($key != 'FAIZDZN_DEV3012') {
        throw new MainException('Invalid Key!', 400);
    }
    
    return response()->redirectTo('/')->withCookie('FAIZDZN_DEV3012', '1');
});

Route::fallback(function () {
    throw new MainException('Page not found!', 404);
});
