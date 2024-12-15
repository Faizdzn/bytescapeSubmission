@aware(['ph', 'id'])

<div onclick="activeDD('{{$id}}', '{{$value}}', '{{$url}}')" id="{{$id}}-item-{{$value}}" class="transition ease-in item-dd justify-between gap-2">
    <div id="{{$id}}-slot-{{$value}}" class="flex gap-4 items-center">
        {{$slot}}
    </div>
    <i id="{{$id}}-check-{{$value}}" class="transition ease-in text-transparent ti ti-check"></i>
</div>