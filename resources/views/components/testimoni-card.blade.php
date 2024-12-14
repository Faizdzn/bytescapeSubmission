<div class="min-w-[350px] flex flex-col gap-2 rounded-lg bg-white p-4 md:snap-center">
    <div class="flex gap-2 items-center">
        <div class="text-3xl">
            <i class="ti ti-user-circle"></i>
        </div>
        <div class="flex flex-col">
            <span>{{$name}}</span>
            <div class="flex gap-1 items-center text-[10px]">
                @for ($i = 1;$i <= (int)$star;$i++)
                    <i class="ti ti-star-filled text-gold"></i>
                @endfor
                @for ($i = 1;$i <= (5 - (int)$star);$i++)
                    <i class="ti ti-star-filled text-black/25"></i>
                @endfor
            </div>
        </div>
    </div>
    <div class="py-6 text-xl">
        "{{$slot}}"
    </div>
</div>