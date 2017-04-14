<?php
namespace phpmatch\Type;

class NullType{
    private $match;

    public function __construct($match)
    {
       $this->match = $match; 
    }
    public function with($with)
    {
        return ($this->match === $with);
    }

}
