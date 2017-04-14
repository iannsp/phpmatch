<?php
namespace phpmatch;

class Match{
    const _     = 'phpmatch_ignore';
    const r     = 'phpmatch_replace';
    const head  ='phpmatch_head';
    const tail  ='phpmatch_tail';

    private $args;

    public function __construct(&$args)
    {   
        $this->args= $args;
    }

    public function with(...$wargs)
    {
        foreach($this->args as $idx=>&$arg){
            if(! TypeStrategy::build($arg)->with($wargs[$idx]))
                return false;    
        }
        return true;
    }

}
