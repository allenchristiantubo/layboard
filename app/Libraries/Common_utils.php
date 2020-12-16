<?php namespace App\Libraries;
date_default_timezone_set("Asia/Manila");
use \DateTime;
class Common_utils
{
    public function GenerateRandomString($length) : string
    {
        $string = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $characterLength = strlen($characters);
        for($i = 0; $i < $length; $i++)
        {
            $string .= $characters[rand(0, $characterLength - 1)];
        }
        return $string;
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

?>