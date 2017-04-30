<?php
namespace phpmatch;

class TypeStrategy{

    public static function build(&$arg)
    {
        if (is_null($arg))
            return new Type\NullType($arg);
        if (is_scalar($arg))
            return new Type\ScalarType($arg);
        if (is_array($arg))
            return new Type\ArrayType($arg);

    }
}
