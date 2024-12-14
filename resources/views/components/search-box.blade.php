<div class="flex-1 relative flex flex-col">
    <div class="flex items-center gap-[15px] px-[25px] py-[15px] rounded-full bg-black/5 text-black/50 text-sm">
        <i class="ti ti-search"></i>
        <input type="text" id="search-{{$cid}}" oninput="searchBar({{(int)$cid}})" class="flex-1 bg-transparent focus:outline-none" placeholder="{{$ph}}">
    </div>
    <div id="searchQuery-{{$cid}}" class="overflow-clip z-[1000] hidden absolute top-[50px] w-full bg-white_1 rounded-md shadow-md shadow-black_1/25">
        <a id="searchCourse-{{$cid}}" class="p-4 hover:bg-black_1/5 flex items-center">
            <i class="ti ti-school mr-4"></i>
            Cari "
            <span id="searchVal-{{$cid}}"></span>
            " di Course
        </a>
        <a id="searchKelas-{{$cid}}" class="p-4 hover:bg-black_1/5 flex items-center">
            <i class="ti ti-chalkboard mr-4"></i>
            Cari "
            <span id="searchVal-{{$cid}}"></span>
            " di Kelas
        </a>
    </div>
</div>