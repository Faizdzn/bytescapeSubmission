@extends('layout.sidebar', [
    'nav' => 'Kelas'
])

@section('content')
<div class="centered flex flex-col gap-6 p-2">
    <span class="text-3xl text-green font-bold">Kelas</span>
    <div class="flex flex-col gap-2">
        <x-input name="Cari Kelas" id="search_norm" value="{{request()->query('search')}}"></x-input>
        <div class="flex max-md:flex-col gap-6">
            <x-dropdown id="kelas-dd" ph="Urut Hasil" value="{{$sort}}">
                @foreach ($sort_arr as $d => $v)
                    <x-dropdown-item value="{{$v}}">
                        {{$d}}
                    </x-dropdown-item>
                @endforeach
            </x-dropdown>
            <x-button  variant="highlight" fn="searchKelas()">
                <i class="ti ti-search"></i>
                Cari
            </x-button>
        </div>
    </div>
    <hr>
    <div class="flex flex-wrap justify-center max-md:flex-col gap-4">
        <x-kelas-card kid="2"></x-kelas-card>
        <x-kelas-card></x-kelas-card>
        <x-kelas-card></x-kelas-card>
        <x-kelas-card></x-kelas-card>
        <x-kelas-card></x-kelas-card>
        <x-kelas-card></x-kelas-card>
        <x-kelas-card></x-kelas-card>
    </div>
    <x-pagination id="kelas-page" current="{{$page}}"></x-pagination>
</div>
@endsection