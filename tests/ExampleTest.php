<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/23/2015
 * Time: 5:27 PM
 */

class ExampleTest extends PHPUnit_Framework_TestCase {

    private $example;

    /**
     *
     */
    public function setUp()
    {
        $this->example = new \forevermore\Example();
    }

    /**
     *
     */
    public function testReturnOne()
    {
        $result = $this->example->run();
        $this->assertEquals(1,$result);
    }

    /**
     * @return array
     */
    public function sumDataProvider()
    {
        return [
            [3, 6],
            [4, 10],
            [5, 15]

        ];
    }
    /**
     * @dataProvider sumDataProvider
     */
    public function testSum($count, $expect)
    {
        $this->assertEquals(6, $this->example->countSum(3));
    }

    /**
     * @return array
     */
    public function jumpDataProvider()
    {
        return [
            [2, 8, 3, 2],
            [0, 5, 2, 3],

        ];
    }

    /**
     * @param $x
     * @param $y
     * @param $d
     * @param $expects
     * @dataProvider jumpDataProvider
     */
    public function testJumps($x, $y, $d, $expects)
    {
        $this->assertEquals($expects, $this->example->countJumps($x, $y, $d));
    }
    /**
     * @return array
     */
    public function missingProvider()
    {
        return [
            [[1, 2, 3], 4],
            [[2, 3, 4], 1],

        ];
    }

    /**
     * @dataProvider missingProvider
     */
    function testMissing($numbers, $expects){
        $this->assertEquals($expects, $this->example->findMissing($numbers));
    }

    /**
     * @return array
     */
    public function dublicateProvider()
    {
        return [
            [[1, 1, 1, 2, 3, 3], 1],
            [[2, 3, 4], 3],
        ];
    }

    /**
     * @dataProvider dublicateProvider
     */
    function testDublicate($numbers, $expects){
        $this->assertEquals($expects, $this->example->findDublicates($numbers));
    }


    /**
     * @return array
     */
    public function stockProvider()
    {
        return [
            [[100, 200, 300], 200], //get max
            [[300, 200, 100], 0], //get 0
            [[200, 400, 100, 900],800], //temp buy price
            [[200, 400, 100, 200],200], //temp buy price 2
            [[200, 400, 100, 200, 100, 400, 900],800], //temp buy price 3

        ];
    }

    /**
     * @dataProvider stockProvider
     */
    function testStocks($prices, $expects){
        $this->assertEquals($expects, $this->example->findProfit($prices));
    }

    /**
 * @return array
 */
    public function selfieProvider()
    {
        return [
            [[0],0],
            [[5, 5, 5, 5],0],
            [[1],1],
            [[5, 1, 1, 1, 1, 4], 2],
            [[5, 1, 1 ,1, 4, 1, 1, 1, 4], 3],
            [[1, 5, 3, 4, 3, 4, 1, 2, 3, 4, 6, 2], 3],
            [[1, 3, 1, 3, 1, 3, 1, 3], 2],
            [[1, 2, 2, 1, 3, 1, 5, 4, 1, 1, 1, 5, 1, 1, 3, 4, 1, 5, 1], 3],
            [[3, 1, 3], 2],
            [[5, 1, 5, 1 , 1, 1, 5 , 1, 1, 5, 1, 5, 1, 5], 3]

        ];
    }

    /**
     * @dataProvider selfieProvider
     */
    function testSelfies($towerHeights, $expects){
        $this->assertEquals($expects, $this->example->calculateSelfies($towerHeights));
    }

    /**
     * @return array
     */
    public function towerProvider()
    {
        return [
            [[1, 5, 3, 4, 3, 4, 1, 2, 3, 4, 6, 2], [1, 3, 5, 10]], //example
            [[5, 1, 3], [0, 2]],
            [[0],null],
            [[1], [0]]
        ];
    }

    /**
     * @dataProvider towerProvider
     */
    function testTowers($towerHeights, $expects){
        $this->assertEquals($expects, $this->example->findTallest($towerHeights));
    }

}
