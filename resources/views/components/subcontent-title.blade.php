@if ($variant == 'default')
<div class="mx-auto">
    <div class="flex flex-col relative">
        <span class="rounded-full px-3 py-2 bg-green text-white_1 text-md font-bold">
            {{$text}}
        </span>
        <i class="absolute right-[45%] bottom-[-10px] ti ti-triangle-filled text-green rotate-180"></i>
    </div>
</div>
@else
<div class="mx-auto">
    <div class="flex flex-col relative">
        <span class="rounded-full px-3 py-2 bg-white_1 text-green text-md font-bold">
            {{$text}}
        </span>
        <i class="absolute right-[45%] bottom-[-10px] ti ti-triangle-filled text-white_1 rotate-180"></i>
    </div>
</div>
@endif