<?php

namespace App\Utilities;

use App\Models\User;

class Extra {
    public static function userExist(string $username): bool {
        $exi = User::select()->where('name', 'like', $username)->count();
        return $exi > 0;
    }

    public static function userIdExist(int $uid): bool {
        $exi = User::select()->where('id', $uid)->count();
        return $exi > 0;
    }
}