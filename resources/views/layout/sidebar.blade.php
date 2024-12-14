@extends('layout.main', [
    'nav' => $nav ?? "Tempat kumpul belajarmu"
])

@section('bar')
    <app class="flex flex-col gap-[25px]">
        <nav class="flex flex-col">
            <div class="bg-white_1 max-md:flex max-md:flex-col fixed z-[10000] top-0 w-full p-4 max-md:p-2 border-b-2 border-black_1/15">
                <div class="flex gap-2 justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div onclick="openSb()" class="flex justify-center items-center hover:bg-dark_green/15 hover:text-green p-2 rounded-md">
                            <i class="ti ti-menu"></i>
                        </div>
                        <img src="/assets/logo.svg" width="21">
                    </div>
                    <div class="max-md:hidden flex-1 max-w-[50%] flex justify-center items-center">
                        <x-search-box cid="1"></x-search-box>
                    </div>
                    <div>
                        <x-profile-dropdown></x-profile-dropdown>
                    </div>
                </div>
                <div class="md:hidden flex justify-center items-center p-4">
                    <div class="flex-1 flex justify-center items-center">
                        <x-search-box cid="2"></x-search-box>
                    </div>
                </div>
            </div>
            <div id="sbContent" class="close-side fixed z-[9900] left-0 bg-white_1 p-3 w-[250px] max-md:border-b-2 md:border-r-2 border-black_1/15 md:h-screen max-md:w-screen">
                
            </div>
        </nav>
        <main class="min-h-[450px] mt-[90px] max-md:mt-[150px] flex flex-col gap-8 items-center">
            @yield('content')
        </main>
        <div class="centered">
            <x-footer></x-footer>
        </div>
    </app>
@endsection