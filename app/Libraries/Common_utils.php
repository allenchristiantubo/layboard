<?php namespace App\Libraries;

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
}

?>