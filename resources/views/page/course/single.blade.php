@extends('layout.sidebar', [
    'nav' => $course_name
])

@section('content')
<div class="centered flex flex-col gap-6 p-2">
    <a href="/course" class="a_1 flex items-center gap-2 text-sm">
        <i class="ti ti-arrow-left"></i>
        Kembali ke halaman pencarian
    </a>
    <div class="flex flex-col gap-7">
        <div class="max-md:mx-auto w-full h-[250px] rounded-xl bg-black_1/25"></div>
        <div class="flex gap-2 justify-between">
            <div class="flex flex-col">
                <span class="text-3xl text-green font-bold">
                    {{'Course Name'}}
                </span>
                <a href="/kelas/{{$kelas_id ?? 1}}" class="a_1 flex items-center text-sm gap-1 text-black_1/25">
                    <i class="ti ti-chalkboard"></i>
                    Class Name
                </a>
            </div>
            <div class="flex gap-2 items-center">
                <i class="ti ti-star-filled text-gold"></i>
                4.5
            </div>
        </div>
        <x-rating id="rate-course" fn="login"></x-rating>
        <div class="flex max-md:flex-col gap-2">
            <x-button variant="highlight">
                <i class="ti ti-player-play-filled"></i>
                Tonton Course
            </x-button>
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