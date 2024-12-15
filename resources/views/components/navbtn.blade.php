<a href="{{$url}}" class="{{($url == ('/'.request()->path())) ? 'bg-dark_green/15 text-green border-green' : 'border-transparent'}} flex-1 flex items-center gap-[10px] transition ease-in px-[21px] py-[15px] border-l-4 hover:text-green hover:border-green hover:bg-dark_green/15">
{{$slot}}
</a>