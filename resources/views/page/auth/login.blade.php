@extends('layout.sidebar', [
    'nav' => 'Login'
])

@section('content')
    <div class="centered md:max-w-[45%] flex flex-col gap-2 p-2">
        <div class="flex flex-col gap-2">
            <span class="text-3xl text-green font-bold">Login</span>
            <span class="text-sm opacity-25">Welcome back!</span>
        </div>
        <div class="flex flex-col gap-4 my-[21px]">
            <x-input name="Username" id="username"></x-input>
            <x-input name="Password" id="password"></x-input>
        </div>
        <div class="flex flex-col gap-2">
            <x-button variant="highlight" fn="login()">
                <i class="ti ti-login"></i>
                Login
            </x-button>
            <span class="mx-auto flex gap-2 items-center text-black_1/25">
                Didnt have account? <a href="/register" class="a">Register Now</a>
            </span>
        </div>
    </div>
    {{$c}}
    {{request()->cookie('edu-token')}}
@endsection