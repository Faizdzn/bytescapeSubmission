@php
use App\Utilities\Jwt;
use App\Models\KelasEntry;

$c = request()->cookie('edu-token');
if($c != null) {
    $u = Jwt::decrypt($c);
    $joinKelas = KelasEntry::select()->where('user_id', $u->id)->where('kelas_id', $id)->count();
}
@endphp

@extends('layout.sidebar', [
    'nav' => $kelas['kelas_name']
])

@section('content')
<div class="centered flex flex-col gap-6 p-2">
    <a href="/kelas" class="a_1 flex items-center gap-2 text-sm">
        <i class="ti ti-arrow-left"></i>
        Kembali ke halaman pencarian
    </a>
    <div class="flex max-md:flex-col gap-6">
        <div class="max-md:mx-auto w-[125px] h-[125px] rounded-xl bg-black_1/25 bg-cover bg-[url('{{$kelas['kelas_thumb']}}')]"></div>
        <div class="flex flex-col gap-4">
            <div class="flex-1 flex flex-col gap-2">
                <span class="text-green text-3xl font-bold">{{$kelas['kelas_name']}}</span>
                <span class="text-sm text-black_1/25 flex gap-1 items-center">
                    <i class="ti ti-user"></i>
                    {{$pelajar}} Pelajar
                </span>
            </div>
            <div class="flex max-md:flex-col gap-2">
                <div>
                    @if ($joinKelas ?? 0)
                    <x-button variant="highlight" fn="leaveClass({{$id}}, '{{$c}}')">
                        <i class="ti ti-logout"></i>
                        Keluar Kelas
                    </x-button>
                    @elseif($c == null)
                    <x-button variant="highlight">
                        <i class="ti ti-login"></i>
                        Login
                    </x-button>
                    @else
                    <x-button variant="highlight" fn="joinClass({{$id}}, '{{$c}}')">
                        <i class="ti ti-chalkboard"></i>
                        Gabung Kelas
                    </x-button>
                    @endif
                </div>
                <div>
                    <x-button fn="shareUrl('/kelas/{{$id}}')" variant="default">
                        <i class="ti ti-share"></i>
                        Share
                    </x-button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="flex flex-col gap-2">
        <x-input name='Cari Course Dari "{{$kelas->kelas_name}}"' id="search_course" value="{{request()->query('search')}}"></x-input>
        <div class="flex max-md:flex-col gap-6">
            <x-dropdown id="course-dd" ph="Urut Hasil" value="{{$sort}}">
                @foreach ($sort_arr as $d => $v)
                    <x-dropdown-item value="{{$v}}">
                        {{$d}}
                    </x-dropdown-item>
                @endforeach
            </x-dropdown>
            <x-button  variant="highlight" fn="searchCourseInKelas({{$id}})">
                <i class="ti ti-search"></i>
                Cari
            </x-button>
        </div>
    </div>
    <div class="mt-[15px] flex flex-wrap justify-center max-md:flex-col gap-4">
        @foreach ($course as $i)
        <x-course-card cid="{{$i['course_id']}}"></x-course-card>
        @endforeach
    </div>
    <x-pagination id="course-page" max="{{$max_page}}" current="{{$page}}"></x-pagination>        
</div>
@endsection