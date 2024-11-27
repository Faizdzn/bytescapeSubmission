<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Utilities\Jwt;
use Illuminate\Http\Request;

class test extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $arg1, string $arg2)
    {
        // Course::all()->where('course_name', null, 'test')->first()->update([
        //     'course_name' => 'test213'
        // ]);

        $jwtKey = env('JWT_KEY');
        $payload = [
            'test' => 'ye',
            // 'exp' => time() + (60*60)
        ];

        $jwt_enc = Jwt::sign([
            'user' => 'e'
        ]);
        $jwt_dec = Jwt::decrypt($jwt_enc);
        
        return response()->json(array(
            'arg1' => $arg1,
            'arg2' => $arg2,
            'env' => env('JWT_KEY'),
            // 'today' => date('d-m-y H:i:s', time() + 86400)
            'jwt' => [
                $jwt_enc,
                $jwt_dec,
                request()->cookie('testKey_test')
            ],
            'user' => User::all()->filter(function($k) {
                return $k['role'] == 'siswa';
            }),
            'course' => [Course::all(), Course::where('course_name', 'LIKE', '%test%')->get()]
        ))->withCookie(cookie()->forever('testKey_test', $jwt_enc));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
