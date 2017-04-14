<?php
namespace phpmatch;

class Match{
    private $args;
    public function __construct($args)
    {   
        $this->args= $args;
    }

    public function with(...$wargs)
    {
        return ($this->args === $wargs);
    }

}
