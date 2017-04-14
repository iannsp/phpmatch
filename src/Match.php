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
        foreach($this->args as $idx=>$arg){
            if(!(new Type\ScalarType($arg))->with($wargs[$idx]))
                return false;    
        }
        return true;
    }

}
