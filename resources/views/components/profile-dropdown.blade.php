@php
use App\Utilities\Jwt;
use App\Models\User;

$c = request()->cookie('edu-token');
if($c != null) {
    $u = Jwt::decrypt($c);
    $udt = User::select()->where('id', $u->id)->first();
}
@endphp

<div class="relative flex flex-col items-end">
    <div onclick="profileDD()" class="group flex items-center gap-2">
        <div id="profPP" class="transition ease-in border-2 border-transparent group-hover:border-green border-green flex justify-center items-center bg-black_1/15 text-black_1/50 p-3 rounded-full">
            <i class="ti ti-user"></i>
        </div>
        <i id="caret" class="caret group-hover:text-green ti ti-caret-down-filled"></i>
    </div>
    <div id="profDD" class="close-dd z-[3000] absolute top-[45px] flex flex-col rounded-md bg-white_1 w-[150px]">
        @if ($c != null)
            <span class="text-black_1/50 p-2 text-center border-b-2 border-black_1/5">{{$udt->name}}</span>
            <a href="/my/settings" class="flex gap-4 items-center px-4 py-2 hover:bg-dark_green/10 hover:text-green">
                <i class="ti ti-settings"></i>
                Pengaturan
            </a>
            <a href="/logout" class="flex gap-4 items-center px-4 py-2 hover:bg-red-700/25 text-red-500">
                <i class="ti ti-logout"></i>
                Keluar
            </a> 
        @else
            <a href="/login" class="flex gap-4 items-center px-4 py-2 hover:bg-dark_green/10 hover:text-green">
                <i class="ti ti-login"></i>
                Login
            </a>
            <a href="/register" class="flex gap-4 items-center px-4 py-2 hover:bg-dark_green/10 hover:text-green">
                <i class="ti ti-pencil"></i>
                Register
            </a>
        @endif
    </div>
</div>