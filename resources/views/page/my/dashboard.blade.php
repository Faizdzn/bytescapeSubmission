@php
use App\Utilities\Jwt;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Course;
use App\Models\KelasEntry;
use App\Models\CourseEntry;

$c = request()->cookie('edu-token');
$u = Jwt::decrypt($c);
$udt = User::select()->where('id', $u->id)->first();

$kelas = Kelas::select()->orderBy('kelas_id', 'desc')->limit(5)->get();
$course = Course::select()->orderBy('course_id', 'desc')->limit(5)->get();
$course_c = CourseEntry::select()->where('user_id', $u->id)->count();
$kelas_c = KelasEntry::select()->where('user_id', $u->id)->count();
@endphp

@extends('layout.sidebar', [
    'nav' => 'Dashboard'
])

@section('content')
<div class="centered flex flex-col gap-6">
    <div class="w-full flex flex-col gap-4 items-center">
        <span class="text-green font-bold text-3xl">
            Welcome, {{$udt->name}}!
        </span>
        <div class="w-full flex flex-wrap gap-4 p-2">
            <div class="flex-1 min-w-[250px] flex flex-col gap-2 text-black_1/25 border-2 border-black_1/10 rounded-xl p-3">
                <span class="text-sm">Course Yang Kamu Kunjungi</span>
                <span class="flex items-center gap-2 text-2xl text-green">
                    <i class="ti ti-school"></i>
                    {{$course_c}}
                </span>
            </div>
            <div class="flex-1 min-w-[250px] flex flex-col gap-2 text-black_1/25 border-2 border-black_1/10 rounded-xl p-3">
                <span class="text-sm">Kelas Yang Kamu Ikuti</span>
                <span class="flex items-center gap-2 text-2xl text-green">
                    <i class="ti ti-chalkboard"></i>
                    {{$kelas_c}}
                </span>
            </div>
        </div>
    </div>
    <hr>
    <x-carousel text="Course Terbaru" url="/course">
        @foreach ($course as $i)
        <x-course-card cid="{{$i['course_id']}}"></x-course-card>
        @endforeach
    </x-carousel>
    <x-carousel text="Kelas Terbaru" url="/kelas">
        @foreach ($kelas as $i)
        <x-kelas-card kid="{{$i['kelas_id']}}"></x-kelas-card>
        @endforeach
    </x-carousel>
</div>
@endsection