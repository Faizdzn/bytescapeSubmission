<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Parsedown;

class CourseController extends Controller
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

        return view('page.course.index', [
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
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Request $request, Course $course)
    {
        $md = new Parsedown();

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
        
        return view('page.course.single', [
            'id' => $id,
            'course_name' => 'Test Course',
            'course_about' => $md->parse("# Test\nThis is a test"),
            'sort_arr' => $sort_arr,
            'sort' => $s,
            'page' => $p
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
