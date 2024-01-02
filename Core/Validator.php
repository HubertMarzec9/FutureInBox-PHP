<?php

namespace Core;

class Validator{
    public static function string($value, $min = 1, $max = PHP_INT_MAX): bool
    {
        return strlen(trim($value)) >= $min and strlen(trim($value)) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value,FILTER_SANITIZE_EMAIL);
    }
}