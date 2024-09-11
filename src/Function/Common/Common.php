<?php

namespace Function\Common;

class Common
{
    public static function dd($data)
    {
        var_dump($data);
        die();
    }
}