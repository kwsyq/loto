<?php

namespace App\Helpers;

class LuckyNumbersHelper
{
    public static function lucky_numbers()
    {
        $numbers=[];
        while(count($numbers)<6)
        {
            $nr=rand(1,90);
            if(!in_array($nr, $numbers))
            {
                $numbers[]=$nr;
            }
        }
        sort($numbers);
        return $numbers;
    }
    public static function format_lucky_numbers($numbers)
    {
        return $numbers[0].", ".$numbers[1].", ".$numbers[2].", ".$numbers[3].", ".$numbers[4].", ".$numbers[5];
    }

}
