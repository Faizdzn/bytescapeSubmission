@if ($variant == 'default')
    @if (strlen($url) > 0)
        <a href="{{url($url)}}" class="transition ease-in text-black_1 px-[24px] py-[10px] hover:text-green p-2 flex-1 rounded-full border-2 border-black_1/10 hover:border-green/20 hover:bg-dark_green/15 flex gap-2 justify-center items-center">
            {{$slot}}
        </a>
    @elseif (strlen($fn) > 0)
        <a onclick="{{$fn}}" class="transition ease-in text-black_1 px-[24px] py-[10px] hover:text-green p-2 flex-1 rounded-full border-2 border-black_1/10 hover:border-green/20 hover:bg-dark_green/15 flex gap-2 justify-center items-center">
            {{$slot}}
        </a>
    @else
        <a class="transition ease-in text-black_1 px-[24px] py-[10px] hover:text-green p-2 flex-1 rounded-full border-2 border-black_1/10 hover:border-green/20 hover:bg-dark_green/15 flex gap-2 justify-center items-center">
            {{$slot}}
        </a>
    @endif
@elseif ($variant == 'highlight')
    @if (strlen($url) > 0)
        <a href="{{url($url)}}" class="transition ease-in text-white_1 px-[29px] py-[10px] flex-1 rounded-full bg-green hover:bg-dark_green flex gap-2 justify-center items-center">
            {{$slot}}
        </a>
    @elseif (strlen($fn) > 0)
        <a onclick="{{$fn}}" class="transition ease-in text-white_1 px-[29px] py-[10px] flex-1 rounded-full bg-green hover:bg-dark_green flex gap-2 justify-center items-center">
            {{$slot}}
        </a>
    @else
        <a class="transition ease-in text-white_1 px-[29px] py-[10px] flex-1 rounded-full bg-green hover:bg-dark_green flex gap-2 justify-center items-center">
            {{$slot}}
        </a>
    @endif
@endif
