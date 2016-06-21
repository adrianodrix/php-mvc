<?php

namespace SON\DI;

use App\Init;

class Container
{
    public static function getClass($name)
    {
        $str_class = "\\App\\Models\\". ucfirst($name);
        $class = new $str_class(Init::getDb());
        return $class;
    }
}