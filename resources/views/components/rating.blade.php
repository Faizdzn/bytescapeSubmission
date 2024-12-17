<div id="{{$id}}-val" value="{{$value}}" class="flex flex-col gap-2">
    <span id="{{$id}}-label" class="text-sm text-black_1/25">{{intval($disable) >= 1 ? $disableText : (intval($value) > 0 ? 'Rating Anda' : 'Belum Anda Rating')}}</span>
    <div class="flex gap-4 text-black_1/15">
        @for ($i = 1; $i <= 5; $i++)
        @if (intval($disable) >= 1) 
        <div id="{{$id}}-star-{{$i}}" class="text-3xl {{($i <= (intval($value) ?? 0) && (intval($value) ?? 0) >= 0) ? 'text-gold' : ''}}">
            <i class="ti ti-star-filled"></i>
        </div>
        @else
        <div onclick="addStar('{{$id}}', {{$i}}{{strlen($fn) > 0 ? ', '.$fn : ''}})" id="{{$id}}-star-{{$i}}" class="text-3xl {{($i <= (intval($value) ?? 0) && (intval($value) ?? 0) >= 0) ? 'text-gold' : ''}}">
            <i class="ti ti-star-filled"></i>
        </div>
        @endif
        @endfor
    </div>
</div>