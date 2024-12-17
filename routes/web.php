<?php

use App\Exceptions\MainException;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\test;
use App\Http\Controllers\test2;
use App\Utilities\Jwt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(request()->cookie('edu-token')) {
        return redirect('/my/dashboard');
    }

    return view('page.main');
});

Route::get('/login', function () {
    if(request()->cookie('edu-token')) {
        return redirect('/my/dashboard');
    }

    return view('page.auth.login');
});

Route::get('/register', function () {
    if(request()->cookie('edu-token')) {
        return redirect('/my/dashboard');
    }

    return view('page.auth.register');
});

Route::prefix('/my')->group(function () {
    Route::get('/dashboard', function (Request $request) {
        $access = $request->query('access');
        if(!request()->cookie('edu-token') && strlen($access) < 1) {
            return redirect('/login');
        }
    
        if(strlen($access) > 0) {
            if(!Jwt::decrypt($access)) {
                throw new MainException("Bad Request", 400);
            }

            return response()->redirectTo('/my/dashboard')->withCookie(cookie('edu-token', $access));
        }
        return view('page.my.dashboard');
    });

    Route::get('/settings', function () {
        if(!request()->cookie('edu-token')) {
            return redirect('/login');
        }

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
    
    Route::get('/{id}/tonton', [CourseController::class, 'tonton']);
});

Route::get('test', function (Request $request) {
    return response()->json([
        'cookie' => $request->cookie('edu-token')
    ]);
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
