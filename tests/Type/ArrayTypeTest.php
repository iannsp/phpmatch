<?php
namespace phpmatch\Type;
use phpmatch;
use \phpmatch\Match as M;

class ArrayTypeTest extends \PHPUnit_Framework_TestCase 
{

    public function providerScalar()
    {
        return [
            [ [], [], true],
            [ [], [1], false],
            [ [1], [1], true],
            [ [1], [2], false]
       ];
    }

    /**
     * @dataProvider providerScalar
     */
    public function testMatch($a, $b, $expected)
    {
        $this->assertEquals($expected, phpmatch\match($a)->with($b));
    }    

    public function providerNulls()
    {
        return  [
            [null, [1], false],
            [null, 1, false],
            ["batman", null, false]

        ];
    }

    /**
     * @dataProvider providerNulls
     */
    public function testMatchNull($a, $b, $expected)
    {
        $this->assertEquals($expected, phpmatch\match($a)->with($b));
    }

    public function testMatchItems()
    {
        $a = [1,2,3];
        $b = [null,null,null];
        $this->assertFalse(phpmatch\match($a)->with($b));
        $this->assertTrue(phpmatch\match($a)->with($a));
        $this->assertTrue(phpmatch\match($b)->with($b));
        $this->assertFalse(phpmatch\match($b)->with($a));

        $a = ['one'=>1   ,'two'=>2   ,'three'=> 3];
        $b = ['one'=>null,'two'=>null,'three'=>null];
        $this->assertFalse(phpmatch\match($a)->with($b));
        $this->assertTrue(phpmatch\match($a)->with($a));
        $this->assertFalse(phpmatch\match($b)->with($a));
        $this->assertTrue(phpmatch\match($b)->with($b));
    }

    public function testMatchIgnore()
    {
        $a = [M::_,2,3];
        $b = ["lalalalala", 2, 3];
        $this->assertTrue(phpmatch\match($a)->with($b));
    }

    public function testMatchReplace()
    {
        // equals values plus replace
        $a = [m::r,2,3];
        $b = ["lalalalala", 2, 3];
        $this->assertTrue(phpmatch\match($a)->with($b));
        $this->assertEquals($a, $b);

        // diff values plus replace
        $a = [m::r,5,3];
        $b = ["lalalalala", 2, 3];
        $this->assertFalse(phpmatch\match($a)->with($b));
        $this->assertNotEquals($a, $b);
    }

    public function testMatchHeadTail()
    {
        //TODO get a better interface to head tail 
        $a = [M::head, M::tail];
        $b = ["lalalalala", 2, 3];
        $this->assertTrue(phpmatch\match($a)->with($b));
        $this->assertEquals($a->head,"lalalalala");
        $this->assertEquals($a->tail,[2,3]);

        $newA = [M::head, M::tail];
        $this->assertTrue(phpmatch\match($newA)->with($a->tail));
        $this->assertEquals($newA->head,2);
        $this->assertEquals($newA->tail,[3]);
    }

    public function testMatchEmpty()
    {
        //TODO get a better interface to head tail 
        $a = [];
        $b = [];
        $this->assertTrue(phpmatch\match($a)->with($b));
    }

}
