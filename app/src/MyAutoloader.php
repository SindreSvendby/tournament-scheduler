<?php

namespace ts;

spl_autoload_register(__NAMESPACE__ . "\\MyAutoloader::load");

class MyAutoloader
{
    public static function load($className)
    {
        $classpath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $filepath = dirname(__FILE__) . DIRECTORY_SEPARATOR . $classpath . ".php";
        if (file_exists($filepath)):
            require $filepath;
            if (class_exists($className)):
                return true;
            endif;
        endif;
        return false;
    }
}
