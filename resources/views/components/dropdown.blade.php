<div id="{{$id}}-val" value="" class="flex-1 flex flex-col gap-2 relative">
    <div onclick="openDD('{{$id}}')" class="transition ease-in border-2 border-black_1/15 text-black_1/25 hover:text-black_1/50 rounded-md flex justify-between items-center p-[10px]">
        <span id="{{$id}}-ph" class="flex items-center gap-2">{{$ph}}</span>
        <i id="{{$id}}-caret" class="caret ti ti-caret-down-filled"></i>
    </div>
    <div id="{{$id}}-content" class="close-dd z-[3000] absolute top-[45px] flex flex-col rounded-md bg-white_1 w-full">
        {{$slot}}
    </div>
</div>

<script>
    @if (strlen($value) > 0)
        activeDD('{{$id}}', '{{$value}}')
    @endif
</script>