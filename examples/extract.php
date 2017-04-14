<?php
require __DIR__."/../vendor/autoload.php";

use \phpmatch\Match as M;

class Extractor 
{
    private $total =0;
    public function it($address=[])
    {
//        var_dump($address);
        $addrType1 = ["street"=>M::r,"number"=>M::r ];
        $addrType2 = ["street"=>M::r,"block"=>M::r];
        $addrType3 = ["street"=>M::r,"house"=>M::r];
        if(\phpmatch\match($addrType1)->with($address)){
            return "{$addrType1['street']}, {$addrType1['number']}";
        }else if (\phpmatch\match($addrType2)->with($address)){
            return "{$addrType2['street']}, {$addrType2['block']}";
        }else if (\phpmatch\match($addrType3)->with($address)){
            return "{$addrType3['street']}, {$addrType3['house']}";
        }
    }
}

$addrs = [
    ["street"=>"Av Brasil", "number"=>10],
    ["street"=>"Av Paulista", "block"=>"11"],
    ["street"=>"Rua Verbo Divino", "house"=>2]
];
foreach ($addrs as $addr){
 echo (new Extractor)->it($addr)."\n";
}
