<div class="flex flex-col gap-4 p-2">
    <a href="{{$url}}" class="a_1 flex items-center gap-2">
        {{$text}}
        <i class="ti ti-arrow-right"></i>
    </a>
    <div class="scroll-hide flex gap-4 overflow-auto snap-x">
        {{$slot}}
    </div>
</div>