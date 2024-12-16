@extends('layout.sidebar', [
    'nav' => 'Settings'
])

@section('content')
<div class="centered md:max-w-[45%] flex flex-col gap-2 p-2">
    <span class="text-3xl text-green font-bold">Settings</span>
    <div class="flex flex-col gap-4 my-[21px]">
        <x-input name="Username" id="username-cu"></x-input>
        <x-input name="Password" id="password-cu"></x-input>
        <div class="mt-[16px]">
            <x-button variant="highlight" fn="changeUsername()">
                <i class="ti ti-pencil"></i>
                Change Username
            </x-button>
        </div>
    </div>
    <hr>    
    <div class="flex flex-col gap-4 my-[21px]">
        <x-input name="Old Password" id="oldPass-cp"></x-input>
        <x-input name="New Password" id="newPass-cp"></x-input>
        <div class="mt-[16px]">
            <x-button variant="highlight" fn="changePass()">
                <i class="ti ti-pencil"></i>
                Change Password
            </x-button>
        </div>
    </div>
</div>
@endsection