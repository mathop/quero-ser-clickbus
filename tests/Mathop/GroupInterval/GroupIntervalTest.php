<?php

use Mathop\GroupInterval\GroupInterval;

class GroupIntervalTest extends \PHPUnit_Framework_TestCase
{

/**
 * @dataProvider validGroupArgs
 */
    public function testGroup($range, $numberSet, $expected)
    {
        $this->assertEquals($expected, GroupInterval::group($range, $numberSet));
    }

    public function validGroupArgs()
    {
        return [
            [
                10,
                [10, 1, -20,  14, 99, 136, 19, 20, 117, 22, 93,  120, 131],
                [[-20], [1, 10], [14, 19, 20], [22], [93, 99], [117, 120], [131, 136]]
            ],
            [
                15,
                [10, 1, -20,  14, 99, 136, 19, 20, 117, 22, 93, 120, 131],
                [[-20], [1, 10, 14], [19, 20, 22], [93, 99], [117, 120], [131], [136]]
            ],
            [
                null,
                [],
                []
            ]
        ];
    }

/**
 * @dataProvider invalidGroupArgs
 * @expectedException InvalidArgumentException
 */
    public function testGroupException($range, $numberSet)
    {
        GroupInterval::group($range, $numberSet);
    }

    public function invalidGroupArgs()
    {
        return [
            [15, [10, 1, 'A', 14, 99, 133, 19, 20, 117, 22, 93,  120, 131]]
        ];
    }
}
