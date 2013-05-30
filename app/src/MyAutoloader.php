<?php

namespace ts;

spl_autoload_register(__NAMESPACE__ . "\\MyAutoloader::load");

class MyAutoloader
{
    public static function load($className)
    {
        $fullpath = dirname(__FILE__) . "\\" . $className . ".php";
            if(file_exists($fullpath)):
                require $fullpath;
                if(class_exists($className)):
                    return true;
                endif;
            endif;
        return false;
    }
}


