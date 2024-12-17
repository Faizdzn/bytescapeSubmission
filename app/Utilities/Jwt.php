<?php
namespace App\Utilities;

use App\Exceptions\MainException;
use Firebase\JWT\JWT as jw;
use Firebase\JWT\Key;
use stdClass;

class Jwt {
    public static string $key = 'Bytescape3d';
    public static string $algo = 'HS256';

    public static function sign(string | array | int $w): string {
        $jwt = jw::encode($w, self::$key, self::$algo);

        return $jwt;
    }

    public static function decrypt(string $e): stdClass | bool {
        $jwtD = jw::decode($e, new Key(self::$key, self::$algo));
        
        return $jwtD;
    }
}