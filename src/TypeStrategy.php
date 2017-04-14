<?php
namespace phpmatch;

class TypeStrategy{

    public static function build(&$arg)
    {
        if (is_null($arg))
            return self::toNull($arg);
        if (is_scalar($arg))
            return self::toScalar($arg);
        if (is_array($arg))
            return self::toArray($arg);

    }

    private static function toScalar(&$arg)
    {
        return new Type\ScalarType($arg);
    }

    private static function toArray(&$arg)
    {
        return new Type\ArrayType($arg);
    }

    private static function toNull(&$arg)
    {
        return new Type\NullType($arg);
    }

}
