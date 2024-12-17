<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseEntry;
use App\Models\CourseRate;
use App\Models\Kelas;
use App\Models\KelasEntry;
use App\Utilities\Jwt;
use Illuminate\Http\Request;
use Parsedown;

class CourseController extends Controller
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
        ];

        if(!in_array($s, $sort_arr)) {
            $s = 'old';
        }

        if(!intval($p) || intval($p) < 1) {
            $p = 1;
        }

        $course = Course::select()->where('course_name', 'like', '%'.$se.'%')->orderBy('course_id', ($s == 'new' ? 'desc' : 'asc'))->offset(($p - 1) * 10)->limit(10)->get();
        
        $courseCount = Course::select()->where('course_name', 'like', '%'.$se.'%')->count();
        $mp = ceil($courseCount / 10) + 1;

        return view('page.course.index', [
            'course' => $course,
            'page' => $p,
            'max_page' => $mp,
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
    public function show($id, Request $req, Course $course)
    {
        $md = new Parsedown();
        $id = intval($id);

        if(!$id) {
            return redirect('/course');
        }

        $courseDt = Course::select()->where('course_id', $id)->first();   
        
        $star = CourseRate::select(['star'])->where('course_id', $id)->get();
        $starTotal = count($star);
        $starArr = 0;

        foreach($star as $i) {
            $starArr += $i['star'];
        }

        $starAvg = $starTotal > 0 ? ($starArr / $starTotal) : 0;

        $class = Kelas::select()->where('kelas_id', $courseDt->kelas_id)->first();

        return view('page.course.single', [
            'id' => $id,
            'course' => $courseDt,
            'kelas' => $class,
            'course_about' => $md->parse(nl2br($courseDt['course_about'])),
            'star' => $starAvg,
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

    public function tonton($course_id, Request $req) {
        $id = intval($course_id);
        $c = $req->cookie('edu-token');

        if(!$id) {
            // throw new MainException("Invalid id", 400);
            return redirect('/course');
        }

        if(strlen($c) < 1) {
            // throw new MainException("Forbidden!", 403);
            return redirect('/course');
        }

        $jwt = Jwt::decrypt($c);
        $courseDt = Course::all()->where('course_id', $id)->first();
        $checkC = Course::all()->where('course_id', $id)->count();
        $checkE = CourseEntry::all()->where('user_id', $jwt->id)->where('course_id', $id)->count();
        $checkK = KelasEntry::select()->where('user_id', $jwt->id)->where('kelas_id', $courseDt['kelas_id'])->count();

        if($checkK < 1) {
            // throw new MainException("Ands belum bergabung di kelas!", 403);
            return redirect('/course');
        }

        if($checkC < 1) {
            // throw new MainException("Data tidak ditemukan!", 404);
            return redirect('/course');
        }

        if($checkE < 1) {
            $courseE = new CourseEntry();
            $courseE->user_id = $jwt->id;
            $courseE->course_id = $id;
            $courseE->save();
        }

        return redirect($courseDt->course_link);
    }

    public function rate($course_id, Request $req) {
        $id = intval($course_id);
        $star = intval($req->star);
        $c = $req->cookie;

        if(strlen($c) < 1) {
            throw new MainException("No cookies inserted!", 400);
        }
        
        if(!$star && ($star < 1 && $star > 5)) {
            throw new MainException("Bad Request!", 400);
        }

        $jwt = Jwt::decrypt($c);
        $courseDt = Course::all()->where('course_id', $id)->first();
        $checkC = Course::all()->where('course_id', $id)->count();
        $checkE = CourseEntry::all()->where('user_id', $jwt->id)->where('course_id', $id)->count();
        $checkK = KelasEntry::select()->where('user_id', $jwt->id)->where('kelas_id', $courseDt['kelas_id'])->count();
        $checkR = CourseRate::all()->where('user_id', $jwt->id)->where('course_id', $id)->count();

        if($checkK < 1) {
            throw new MainException("Anda belum bergabung di kelas!", 403);
        }

        if($checkC < 1) {
            throw new MainException("Data tidak ditemukan!", 404);
        }

        if($checkE < 1) {
            throw new MainException("Anda belum pernah tonton course ini!", 403);
        }

        if($checkR < 1) {
            $rate = new CourseRate();
            $rate->user_id = $jwt->id;
            $rate->course_id = $id;
            $rate->star = $star;
            $rate->save();
        } else {
            $rate = CourseRate::select()->where('user_id', $jwt->id)->where('course_id', $id);
            $rate->update([
                'star' => $star
            ]);
        }

        return response()->json([
            'msg' => 'Berhasil rating course #'.$id
        ]);
    }
}
