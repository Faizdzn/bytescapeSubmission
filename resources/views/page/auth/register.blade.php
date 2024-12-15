@extends('layout.sidebar', [
    'nav' => 'Register'
])

@section('content')
    <div class="centered md:max-w-[45%] flex flex-col gap-2 p-2">
        <div class="flex flex-col gap-2">
            <span class="text-3xl text-green font-bold">Register</span>
            <span class="text-sm opacity-25">Welcome to the website!</span>
        </div>
        <div class="flex flex-col gap-4 my-[21px]">
            <x-input name="Username" id="username"></x-input>
            <x-input name="Password" id="password"></x-input>
            <x-input name="Confirm Password" id="con-password"></x-input>
        </div>
        <div class="flex flex-col gap-2">
            <x-button variant="highlight" fn="login()">
                <i class="ti ti-pencil"></i>
                Register
            </x-button>
            <span class="mx-auto flex gap-2 items-center text-black_1/25">
                Already have an account? <a href="/login" class="a">Login Now</a>
            </span>
        </div>
    </div>
@endsection