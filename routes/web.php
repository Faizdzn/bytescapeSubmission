<?php

use App\Exceptions\MainException;
use App\Http\Controllers\test;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.main');
});

Route::get('/login', function () {
    return view('page.auth.login', [
        'nav' => 'Login'
    ]);
});

Route::get('/register', function () {
    return view('page.auth.register', [
        'nav' => 'Register'
    ]);
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


Route::get('/test2', function() {
    return response()->view('test');
});

Route::fallback(function () {
    throw new MainException('Page not found!', 404);
});
