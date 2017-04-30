<?php
namespace phpmatch;

class MatchTest extends \PHPUnit_Framework_TestCase 
{

    public function providerScalar()
    {
        return [
            [1,1, true],
            [1,2, false],
            [2,2, true],
            [1.0, 1.0, true ],
            [1.0, 2.0, false],
            [2.0, 2.0, true],
            [true, true, true],
            [true, false, false],
            [false, false, true],
            [false, true, false],
            ["ivo", "ivo", true],
            ["ivo", "batman", false],
            ["batman", "batman", true],
            [1, "batman", false],
            [1.0, 1, false]
       ];
    } 

    /**
     * @dataProvider providerScalar
     */
    public function testMatch($a, $b, $expected)
    {
        $this->assertEquals($expected, match($a)->with($b));
    }    

    public function providerNulls()
    {
        return  [
            [null, null, true],
            [null, 1, false],
            ["batman", null, false]

        ];
    }

    /**
     * @dataProvider providerNulls
     */
    public function testMatchNull($a, $b, $expected)
    {
        $this->assertEquals($expected, match($a)->with($b));
    }    

    public function testVariableUndefined()
    {
        $this->assertTrue(match($newVariable)->with(1));
        $this->assertEquals($newVariable, 1);
    }
}
