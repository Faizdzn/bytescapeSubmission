@extends('layout.main')

@section('bar')
<app class="flex flex-col mx-auto gap-[25px]">
    <nav class="z-[100000] max-md:fixed max-md:top-0 max-md:bg-white_1 centered md:py-[35px] p-[15px] flex max-md:flex-col md:items-center md:justify-between md:gap-[10px]">
        <div class="flex justify-between items-center gap-2">
            <img src="/assets/logo.svg" width="31">
            <div onclick="openNav()" class="text-xl md:hidden rounded-md transition ease-in flex justify-center items-center p-3 text-black_1 hover:bg-dark_green/15 hover:text-green">
                <i class="ti ti-menu"></i>
            </div>
        </div>
        <div id="navContent" class="close-nav flex max-md:flex-col gap-4">
            <x-button variant="highlight" url="/login">Login</x-button>
            <x-button variant="default" url="/register">Register</x-button>
        </div>
    </nav>
    <main class="flex flex-col gap-8 items-center max-md:mt-[90px]">
        @yield('content')
    </main>
    <div class="centered">
        <x-footer></x-footer>
    </div>
</app>
@endsection