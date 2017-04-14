<?php
require __DIR__."/../vendor/autoload.php";

use \phpmatch\Match as M;

class StampMessage
{
    private $stamp;
    public function __construct($stamp=[]) 
    {
        $this->stamp = $stamp;
    }

    public function stamp($message=[])
    {
        \phpmatch\match($message)->with($this->stamp);
        return $message;

    }
}

$stamper = new StampMessage(["name"=>M::_,"company"=>"Wayne Corp","city"=>"Gothan"]);
$batmanCharacthers = [
    ["name"=>"Bruce Wayne", "company"=>M::r, "city"=>M::r],
    ["name"=>"Jim Gordon", "company"=>M::r, "city"=>M::r],
    ["name"=>"Finch", "company"=>M::r, "city"=>M::r]
];
foreach ($batmanCharacthers as &$character){

    $character = $stamper->stamp($character);
}
// each characters are living gothan's 
var_dump($batmanCharacthers);
