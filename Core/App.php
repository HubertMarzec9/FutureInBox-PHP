<?php

namespace Core;

class App{
    public static $container;
    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    public static function bind($class, $fun)
    {
        static::container()->bind($class, $fun);
    }

    public static function resolve($class)
    {
        return static::container()->resolve($class);
    }
}