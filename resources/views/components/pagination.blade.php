<div id="{{$id}}-val" value="{{$current}}" class="mx-auto flex gap-2 items-center">
    <button onclick="btnHref('{{request()->fullUrlWithQuery(['page' => $current - 1])}}')" class=" transition ease-in disabled:border-transparent disabled:text-black_1/25 disabled:bg-black_1/10 rounded-md border-2 hover:text-green hover:border-green/20 hover:bg-dark_green/15 border-black_1/25 text-black_1/25 p-2 flex items-center justify-center" {{((int)$current - 1) < 1 ? 'disabled' : ''}}>
        <i class="ti ti-arrow-left"></i>
    </button>
    <div class="p-3 flex justify-center items-center text-black_1/50">
        Page {{$current}}
    </div>
    <button onclick="btnHref('{{request()->fullUrlWithQuery(['page' => $current + 1])}}')" class=" transition ease-in disabled:border-transparent disabled:text-black_1/25 disabled:bg-black_1/10 rounded-md border-2 hover:text-green hover:border-green/20 hover:bg-dark_green/15 border-black_1/25 text-black_1/25 p-2 flex items-center justify-center" {{((int)$current + 1) >= (int)$max && strlen($max) > 0 ? 'disabled' : ''}}>
        <i class="ti ti-arrow-right"></i>
    </button>
</div>