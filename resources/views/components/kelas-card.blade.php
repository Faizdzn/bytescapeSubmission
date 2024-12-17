<div class="snap-center shadow-md shadow-black_1/25 min-w-[275px] flex p-4 rounded-lg bg-white_1 border-2 border-black_1/10 flex-col gap-2">
    <div class="flex gap-4 items-center">
        <div class="bg-black_1/25 rounded-xl w-[51px] h-[51px] bg-cover bg-[url('{{$kdt['kelas_thumb']}}')]"></div>
        <div class="flex flex-col">
            <span class="text-xl">{{$kdt['kelas_name']}}</span>
            <div class="flex items-center text-sm gap-1 text-black_1/25">
                <i class="ti ti-user-filled"></i>
                {{$pelajar}} Pelajar
            </div>
        </div>
    </div>
    <div class="flex gap-2 mt-4">
        <x-button url="/kelas/{{$kid}}">
            <i class="ti ti-external-link"></i>
            <span>Kunjungi Kelas</span>
        </x-button>
    </div>
</div>