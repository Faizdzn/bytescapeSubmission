<?php
namespace App\Utilities;

class IdentifierJwt {
    public static function isExist(string $jwt): bool {
        if(strlen($jwt)) {
            $encJwt = Jwt::decrypt($jwt);

            return true;
        } else {
            return false;
        }
    }
}