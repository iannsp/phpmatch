<?php
namespace phpmatch\Type;
use \phpmatch\Match as M;

class ArrayType{
    private $match;

    public function __construct(&$match)
    {
       $this->match = &$match; 
    }
    public function with($with)
    {
        $sameSizeOrInternal= ( ((in_array(M::_, $this->match) || in_array(M::r, $this->match)) && count($this->match) == count($with)) || $this->match === $with);
        $head_tail =  (in_array( M::head, $this->match) && in_array( M::tail, $this->match) && count($with)>0 );
        if(!$sameSizeOrInternal && !$head_tail) return false;
        if($sameSizeOrInternal){ 
            foreach($this->match as $idx => &$item){
                if($item== M::r){
                    $this->match[$idx]= $with[$idx];
                }else if($item == M::_)
                    continue;
                else{
                    if($item !== $with[$idx])
                        return false;
                   }
            }
            return true;
        }
        $head= array_shift($with);
        $tail = $with;
        $this->match = new \StdClass;
        $this->match->head = $head;
        $this->match->tail =$tail;
        return true;
    }

}
