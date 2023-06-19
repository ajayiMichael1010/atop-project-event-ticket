<?php

namespace App\Http\Helper;

class HelperFunction
{
    public static function leadingZero(int $num): string
    {
        return $num < 10 ? "00" . $num : ($num < 100 ? "0" . $num : (string) $num);
    }
}
