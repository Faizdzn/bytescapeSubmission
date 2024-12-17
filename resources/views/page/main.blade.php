@php
use App\Models\Course;

$course = Course::select()->orderBy('course_id', 'desc')->limit(5)->get();
@endphp

@extends('layout.navbar')

@section('content')
<div class="centered flex max-md:flex-col gap-6 items-center justify-between">
    <div class="flex-1 flex flex-col gap-[35px]">
        <span class="text-green text-4xl max-md:text-3xl max-md:mt-3 font-bold">
            Tempat Kumpul Belajarmu
        </span>
        <x-search-box cid="1"></x-search-box>
    </div>
    <div class="flex-1 flex justify-end">
        <img src="/assets/ilus.svg" alt="ilus">
    </div>
</div>
<hr class="centered">
<div class="centered flex flex-col gap-6">
    <x-subcontent-title text="Course Terbaru Dari Kelas Kami"></x-subcontent-title>
    <div class="flex max-md:flex-col flex-wrap justify-center gap-6 p-[15px]">
        @foreach ($course as $i)
        <x-course-card cid="{{$i['course_id']}}"></x-course-card>
        @endforeach
    </div>
</div>
<div class="w-full bg-green p-6">
    <div class="centered flex flex-col gap-6">
        <x-subcontent-title text="Apa Yang Mereka Katakan Tentang Kami?" variant="2"></x-subcontent-title>
        <div class="scroll-hide flex max-md:flex-col gap-6 md:overflow-x-auto md:snap-x">
            <x-testimoni-card name="Anthony" star="4">
                Aplikasi ini sangat membantu saya dalam mempelajarin sesuatu yang belum saya pelajari, Terimakasih EduPoint
            </x-testimoni-card>
            <x-testimoni-card name="Anthony" star="3">
                Aplikasinya bagus tetapi saya menemukan suatu bug yang membuat saya agak tidak nyaman yaitu pada fitur rating, semoga kedepannya bisa diperbaikin
            </x-testimoni-card>
            <x-testimoni-card name="Anthony" star="5">
                Fitur-fiturnya keren parah, aku masih bingung sih kenapa website ini pengunjungnya belum terlalu ramai padahal website ini lumayan bagus menurut aku
            </x-testimoni-card>
        </div>
    </div>
</div>
{{-- <div class="relative flex p-4 bg-black/25 w-full overflow-clip">
    <div class="absolute bg-white_1 p-10 rounded-full blur-md -left-10 -top-6 scale-[-150px]"></div>
    <div class="absolute bg-white_1 p-10 rounded-full blur-md -right-10 -top-6 scale-[-150px]"></div>
</div> --}}
@endsection