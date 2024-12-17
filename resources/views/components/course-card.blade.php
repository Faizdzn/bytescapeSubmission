<div class="snap-center shadow-md shadow-black_1/25 md:max-w-[275px] min-w-[275px] flex p-4 rounded-lg bg-white_1 border-2 border-black_1/10 flex-col gap-2">
    <div class="bg-black/25 rounded-md w-full h-[100px] bg-center bg-[url('{{$course['course_thumb']}}')] bg-cover"></div>
    <div class="flex gap-2 justify-between">
        <div class="flex flex-col">
            <span class="text-xl text-green font-bold">{{$course['course_name']}}</span>
            <a href="/kelas/{{$kelas['kelas_id']}}" class="a_1 flex items-center text-sm gap-1">
                <i class="ti ti-chalkboard"></i>
                {{$kelas['kelas_name']}}
            </a>
        </div>
        <div class="flex gap-2 items-center">
            <i class="ti ti-star-filled text-gold"></i>
            {{$star}}
        </div>
    </div>
    <div class="flex gap-2 mt-auto">
        <x-button url="/course/{{$cid}}">
            <i class="ti ti-external-link"></i>
            <span>Kunjungi Course</span>
        </x-button>
    </div>
</div>
