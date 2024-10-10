<?php

namespace App\Helper;

use Carbon\Carbon;

class DateTimeFormat
{
    /**
     * @param string $unix
     * 
     * @return [type]
     */
    public static function unixToFormattedDatetime($unix)
    {
        $expDatetime = Carbon::createFromTimestamp($unix);
        $expFormattedDatetime = $expDatetime->format('Y:m:d H:i:s');
        return $expFormattedDatetime;
    }

}