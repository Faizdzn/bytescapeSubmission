@extends('layout.sidebar', [
    'nav' => 'Dashboard'
])

@section('content')
<div class="centered flex flex-col gap-6">
    <div class="w-full flex flex-col gap-4 items-center">
        <span class="text-green font-bold text-3xl">
            Welcome, Faizdzn!
        </span>
        <div class="w-full flex flex-wrap gap-4 p-2">
            <div class="flex-1 min-w-[250px] flex flex-col gap-2 text-black_1/25 border-2 border-black_1/10 rounded-xl p-3">
                <span class="text-sm">Course Yang Kamu Kunjungi</span>
                <span class="flex items-center gap-2 text-2xl text-green">
                    <i class="ti ti-school"></i>
                    150
                </span>
            </div>
            <div class="flex-1 min-w-[250px] flex flex-col gap-2 text-black_1/25 border-2 border-black_1/10 rounded-xl p-3">
                <span class="text-sm">Kelas Yang Kamu Ikuti</span>
                <span class="flex items-center gap-2 text-2xl text-green">
                    <i class="ti ti-chalkboard"></i>
                    150
                </span>
            </div>
        </div>
    </div>
    <hr>
    <x-carousel text="Course Populer" url="/course">
        <x-course-card></x-course-card>
        <x-course-card></x-course-card>
        <x-course-card></x-course-card>
        <x-course-card></x-course-card>
    </x-carousel>
    <x-carousel text="Kelas Populer" url="/kelas">
        <x-kelas-card></x-kelas-card>
        <x-kelas-card></x-kelas-card>
        <x-kelas-card></x-kelas-card>
        <x-kelas-card></x-kelas-card>
    </x-carousel>
</div>
@endsection