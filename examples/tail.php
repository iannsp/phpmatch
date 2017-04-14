<?php
require __DIR__."/../vendor/autoload.php";

use \phpmatch\Match as M;

class Counter 
{
    private $total =0;
    public function it($characters=[])
    {
        $r = [M::head, M::tail];
        if (\phpmatch\match($r)->with($characters)){
            $this->total++;
            return $this->it($r->tail);
        }
        if(\phpmatch\match($characters)->with([])){
            return $this->total;
        }

    }
}

$counter= new Counter();
$batmanCharacthers = [
    ["name"=>"Bruce Wayne"],
    ["name"=>"Jim Gordon"],
    ["name"=>"Finch"]
];
$total = $counter->it($batmanCharacthers);
var_dump($total);// 3
// each characters are living gothan's 
