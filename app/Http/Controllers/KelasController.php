<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Course;
use App\Models\Kelas;
use App\Models\KelasEntry;
use App\Utilities\Jwt;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $se = $request->query('search') ?? '';
        $p = $request->query('page') ?? 1;
        $s = $request->query('sort') ?? 'new';
        $sort_arr = [
            'Terbaru' => 'new',
            'Terlama' => 'old',
            // 'Sudah Gabung' => 'join'
        ];

        if(!in_array($s, $sort_arr)) {
            $s = 'new';
        }

        if(!intval($p) || intval($p) < 1) {
            $p = 1;
        }

        $kelas = Kelas::select()->where('kelas_name', 'like', '%'.$se.'%')->orderBy('kelas_id', ($s == 'new' ? 'desc' : 'asc'))->offset(($p - 1) * 10)->limit(10)->get();
        
        $kelasCount = Kelas::select()->where('kelas_name', 'like', '%'.$se.'%')->orderBy('kelas_id', ($s == 'new' ? 'desc' : 'asc'))->count();
        $mp = ceil($kelasCount / 10) + 1;

        return view('page.kelas.index', [
            'page' => $p,
            'max_page' => $mp,
            'sort' => $s,
            'sort_arr' => $sort_arr,
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Request $request, Kelas $kelas)
    {
        $id = intval($id);

        if(!$id) {
            return redirect('/kelas');
        }

        $se = $request->query('search') ?? '';
        $p = $request->query('page') ?? 1;
        $s = $request->query('sort') ?? 'pop';
        $sort_arr = [
            'Terbaru' => 'new',
            'Terlama' => 'old',
        ];

        if(!in_array($s, $sort_arr)) {
            $s = 'new';
        }

        if(!intval($p) || intval($p) < 1) {
            $p = 1;
        }

        if(!$id) {
            return redirect('/kelas');
        }

        $kelasDt = Kelas::select()->where('kelas_id', $id)->first();
        $pelajar = KelasEntry::select()->where('kelas_id', $id)->count();
        $course = Course::select()->where('kelas_id', $id)->where('course_name', 'like', '%'.$se.'%')->orderBy('course_id', ($s == 'new' ? 'desc' : 'asc'))->offset(($p - 1) * 10)->limit(10)->get();
        
        $courseCount = Course::select()->where('kelas_id', $id)->where('course_name', 'like', '%'.$se.'%')->orderBy('course_id', ($s == 'new' ? 'desc' : 'asc'))->count();
        $mp = ceil($courseCount / 10) + 1;

        return view('page.kelas.single', [
            'id' => $id,
            'kelas' => $kelasDt,
            'pelajar' => $pelajar,
            'course' => $course,
            'sort_arr' => $sort_arr,
            'sort' => $s,
            'page' => $p,
            'max_page' => $mp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }

    public function gabungKelas($kelas_id, Request $req) {
        $id = intval($kelas_id);
        $c = $req['cookie'];

        if(!$id) {
            throw new MainException("Invalid id", 400);
        }

        if(strlen($c) < 1) {
            throw new MainException("No cookies inserted!", 400);
        }

        $jwt = Jwt::decrypt($c);
        $checkKelas = Kelas::select()->where('kelas_id', $id)->count();
        $checkJoin = KelasEntry::select()->where('user_id', $jwt->id)->where('kelas_id', $id)->count();

        if($checkKelas < 1) {
            throw new MainException("Data tidak ditemukan!", 400);
        }

        if($checkJoin >= 1) {
            throw new MainException("Anda sudah bergabung di kelas ini sebelumnya!", 400);
        }

        $kEntry = new KelasEntry();
        $kEntry->user_id = $jwt->id;
        $kEntry->kelas_id = $id;
        $kEntry->save();

        return response()->json([
            'msg' => 'Berhasil gabung ke kelas #'.$id.'!'
        ]);
    }

    public function keluarKelas($kelas_id, Request $req) {
        $id = intval($kelas_id);
        $c = $req['cookie'];

        if(!$id) {
            throw new MainException("Invalid id", 400);
        }

        if(strlen($c) < 1) {
            throw new MainException("No cookies inserted!", 400);
        }

        $jwt = Jwt::decrypt($c);
        $checkKelas = Kelas::select()->where('kelas_id', $id)->count();
        $checkJoin = KelasEntry::select()->where('user_id', $jwt->id)->where('kelas_id', $id)->count();

        if($checkKelas < 1) {
            throw new MainException("Data tidak ditemukan!", 400);
        }

        if($checkJoin < 1) {
            throw new MainException("Anda belum bergabung di kelas ini!", 400);
        }

        $kEntry = KelasEntry::where('kelas_id', $id);
        $kEntry->delete();

        return response()->json([
            'msg' => 'Berhasil keluar dari kelas #'.$id.'!'
        ]);
    }
}
