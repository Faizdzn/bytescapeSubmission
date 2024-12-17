@php
use App\Utilities\Jwt;
use App\Models\KelasEntry;
use App\Models\CourseRate;

$c = request()->cookie('edu-token');
if($c != null) {
    $u = Jwt::decrypt($c);
    $mystar = CourseRate::select()->where('user_id', $u->id)->where('course_id', $id)->first();
    $joinKelas = KelasEntry::select()->where('user_id', $u->id)->where('kelas_id', $course['kelas_id'])->count();
}
@endphp

@extends('layout.sidebar', [
    'nav' => $course['course_name']
])

@section('content')
<div class="centered flex flex-col gap-6 p-2">
    <a href="/course" class="a_1 flex items-center gap-2 text-sm">
        <i class="ti ti-arrow-left"></i>
        Kembali ke halaman pencarian
    </a>
    <div class="flex flex-col gap-7">
        <div class="max-md:mx-auto w-full h-[250px] rounded-xl bg-black_1/25 bg-[url('{{$course['course_thumb']}}')] bg-cover"></div>
        <div class="flex gap-2 justify-between">
            <div class="flex-[1.9] flex flex-col">
                <span class="text-2xl text-green font-bold">
                    {{$course['course_name']}}
                </span>
                <a href="/kelas/{{$course['kelas_id']}}" class="a_1 flex items-center text-sm gap-1 text-black_1/25">
                    <i class="ti ti-chalkboard"></i>
                    {{$kelas['kelas_name']}}
                </a>
            </div>
            <div class="flex-1 flex gap-2 justify-end p-2">
                <div class="flex gap-2 items-center">
                    <i class="ti ti-star-filled text-gold"></i>
                    {{$star}}
                </div>
            </div>
        </div>
        @if ($c != null)
        <x-rating id="rate-course" value="{{$mystar->star ?? 0}}" fn="rateCourse({{$id}}, '{{$c}}')"></x-rating>
        @endif
        <div class="flex max-md:flex-col gap-2">
            @if ($joinKelas ?? 0)
            <x-button variant="highlight" url="/course/{{$id}}/tonton">
                <i class="ti ti-player-play-filled"></i>
                Tonton Course
            </x-button>
            @elseif ($c == null)
            <x-button variant="highlight" url="/login">
                <i class="ti ti-login"></i>
                Login
            </x-button>
            @else
            <x-button variant="highlight" url="/kelas/{{$course['kelas_id']}}">
                <i class="ti ti-chalkboard"></i>
                Gabung Kelas
            </x-button>
            @endif
            <x-button fn="shareUrl('/course/{{$id}}')" variant="default">
                <i class="ti ti-share"></i>
                Share
            </x-button>
        </div>
    </div>
    <div class="mt-[31px] flex flex-col gap-2">
        <span class="text-sm text-black_1/25 font-bold flex gap-2 items-center">
            <i class="ti ti-info-circle"></i>
            Tentang Course
        </span>
        <div class="md-parse">
            {!! $course_about !!}
        </div>
    </div>
</div>
@endsection