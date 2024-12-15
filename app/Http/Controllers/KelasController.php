<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $p = $request->query('page') ?? 1;
        $s = $request->query('sort') ?? 'pop';
        $sort_arr = [
            'Terbaru' => 'new',
            'Populer' => 'pop',
            'Sudah Gabung' => 'join'
        ];

        if(!in_array($s, $sort_arr)) {
            $s = 'pop';
        }

        if(!intval($p) || intval($p) < 1) {
            $p = 1;
        }

        return view('page.kelas.index', [
            'page' => $p,
            'sort' => $s,
            'sort_arr' => $sort_arr
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
        $p = $request->query('page') ?? 1;
        $s = $request->query('sort') ?? 'pop';
        $sort_arr = [
            'Terbaru' => 'new',
            'Populer' => 'pop',
        ];

        if(!in_array($s, $sort_arr)) {
            $s = 'pop';
        }

        if(!intval($p) || intval($p) < 1) {
            $p = 1;
        }

        if(!$id) {
            return response()->redirectTo('/kelas');
        }

        return view('page.kelas.single', [
            'id' => $id,
            'kelas_name' => 'Test Kelas',
            'sort_arr' => $sort_arr,
            'sort' => $s,
            'page' => $p
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
}
