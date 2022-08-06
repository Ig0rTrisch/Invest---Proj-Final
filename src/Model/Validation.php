<?php

namespace APP\Model;

class Validation
{
    public static function validateString(string $name): bool
    {
        return mb_strlen($name) > 2;
    }

    public static function validatenumber(float $number): bool
    {
        return mb_strlen($number) > 0;
    }
}