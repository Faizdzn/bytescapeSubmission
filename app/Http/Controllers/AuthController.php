<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\Models\User;
use App\Utilities\Extra;
use App\Utilities\Jwt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $user = new User();
        $v_arr = [
            'u' => 'required',
            'p' => 'required',
            'cp' => 'required'
        ];

        $u = htmlentities($request['u']);
        $p = htmlentities($request['p']);
        $cp = htmlentities($request['cp']);

        if(strlen($u) < 1 || strlen($p) < 1 || strlen($cp) < 1) {
            throw new MainException("Semua Input Harus Diisi!", 400);
        }

        if($p != $cp) {
            throw new MainException("Konfirmasi Password Salah!", 400);
        }

        // find exist user
        $exi = Extra::userExist($u);
        if($exi) {
            throw new MainException("Username telah digunakan!", 400);
        }

        $id = $user->insertGetId([
            'name' => $u,
            'password' => Hash::make($p)
        ]);

        $jwtV = [
            'id' => $id,
            'usernane' => $u
        ];
        $jwtE = Jwt::sign($jwtV);

        return response()->json([
            'msg' => 'Registrasi Berhasil!',
            'data' => [
                'token' => $jwtE
            ]
        ]);
    }

    public function login(Request $request) {
        $v_arr = [
            'u' => 'required',
            'p' => 'required',
        ];

        $u = htmlentities($request['u']);
        $p = htmlentities($request['p']);

        if(strlen($u) < 1 || strlen($p) < 1) {
            throw new MainException("Semua Input Harus Diisi!", 400);
        }

        // find exist user
        $exi = Extra::userExist($u);
        if(!$exi) {
            throw new MainException("Data tidak ditemukan", 404);
        }

        $udt = User::select()->where('name', 'like', $u)->first();
        if(!Hash::check($p, $udt['password'])) {
            throw new MainException("Password Salah!", 403);
        }

        $jwtV = [
            'id' => $udt['id'],
            'usernane' => $udt['name']
        ];
        $jwtE = Jwt::sign($jwtV);

        return response()->json([
            'msg' => 'Login Berhasil!',
            'data' => [
                'token' => $jwtE
            ]
        ])->withCookie(cookie('edu-token', $jwtE));
    }

    public function changePass(Request $request) {
        $op = htmlentities($request['op']);
        $np = htmlentities($request['np']);
        
        $cookie = $request->cookie('edu-token');
        if(!$cookie) {
            throw new MainException("Unauthorized", 401);
        }
        $jwt = Jwt::decrypt($cookie);

        if(strlen($op) < 1 || strlen($np) < 1) {
            throw new MainException("Semua Input Harus Diisi!", 400);
        }

        if(!Extra::userIdExist($jwt->id)) {
            throw new MainException("Data tidak ditemukan!", 404);
        }

        $usr = User::select()->where('id', $jwt->id);
        $usr_f = $usr->first();
        if(!Hash::check($op, $usr_f['password'])) {
            throw new MainException("Password salah!", 403);
        }

        $usr->update([
            'password' => Hash::make($np)
        ]);

        return response()->json([
            'msg' => 'Berhasil mengubah password!',
        ]);
    }

    public function changeUsername(Request $request) {
        $u = htmlentities($request['u']);
        $p = htmlentities($request['p']);
        
        $cookie = $request->cookie('edu-token');
        if(!$cookie) {
            throw new MainException("Unauthorized", 401);
        }
        $jwt = Jwt::decrypt($cookie);

        if(strlen($u) < 1 || strlen($p) < 1) {
            throw new MainException("Semua Input Harus Diisi!", 400);
        }

        if(!Extra::userIdExist($jwt->id)) {
            throw new MainException("Data tidak ditemukan!", 404);
        }

        $usr = User::select()->where('id', $jwt->id);
        $usr_f = $usr->first();
        if(!Hash::check($p, $usr_f['password'])) {
            throw new MainException("Password salah!", 403);
        }

        $usr->update([
            'name' => $u
        ]);

        return response()->json([
            'msg' => 'Berhasil mengubah username!',
        ]);
    }
}
