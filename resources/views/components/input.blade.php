<div class="relative flex flex-col mt-[15px]">
    <input oninput="inputAct('{{$id}}')" type="text" id="{{$id}}-val" class="peer inp" value="{{$value}}">
    <span id="{{$id}}-label" class="label">
        {{$name}}
    </span>
</div>

<script>
    inputAct('{{$id}}');
</script>