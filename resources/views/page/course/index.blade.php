@extends('layout.sidebar', [
    'nav' => 'Kelas'
])

@section('content')
<div class="centered flex flex-col gap-6 p-2">
    <span class="text-3xl text-green font-bold">Course</span>
    <div class="flex flex-col gap-2">
        <x-input name="Cari Course" id="search_course" value="{{request()->query('search')}}"></x-input>
        <div class="flex max-md:flex-col gap-6">
            <x-dropdown id="course-dd" ph="Urut Hasil" value="{{$sort}}">
                @foreach ($sort_arr as $d => $v)
                    <x-dropdown-item value="{{$v}}">
                        {{$d}}
                    </x-dropdown-item>
                @endforeach
            </x-dropdown>
            <x-button  variant="highlight" fn="searchCourse()">
                <i class="ti ti-search"></i>
                Cari
            </x-button>
        </div>
    </div>
    <hr>
    <div class="flex flex-wrap justify-center max-md:flex-col gap-4">
        @foreach ($course as $item)
            <x-course-card cid="{{$item['course_id']}}"></x-course-card>
        @endforeach
    </div>
    <x-pagination id="course-page" max="{{$max_page}}" current="{{$page}}"></x-pagination>
</div>
@endsection