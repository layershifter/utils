<?php
/**********************************************************************************************************************
 *  Utils: A collection of useful PHP functions, mini classes and snippets that you need or could use every day.      *
 *                                                                                                                    *
 *  @link      https://github.com/layershifter/utils                                                                  *
 *                                                                                                                    *
 *  @copyright Copyright (c) 2016, Alexander Fedyashov                                                                *
 *  @license   https://raw.githubusercontent.com/layershifter/utils/master/LICENSE Apache 2.0 License                 *
 **********************************************************************************************************************/

namespace LayerShifter\Utils\Tests;

use LayerShifter\Utils\Arr;

/**
 * Test cases for Arr class.
 */
class ArrTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test for first() method.
     *
     * @return void
     */
    public function testFirst()
    {
        self::assertEquals(1, Arr::first([1, 2, 3]));
        self::assertEquals('a', Arr::first(['a', 'b', 'c']));
        self::assertNotEquals('b', Arr::first(['a', 'b', 'c']));

        self::assertEquals(2, Arr::first([1, 2, 3], function ($value) {
            return $value === 2;
        }));
        self::assertEquals(null, Arr::first([1, 2, 3], function ($value) {
            return $value === 20;
        }));

        self::assertInternalType('int', Arr::first([1, 2, 3]));
        self::assertInternalType('string', Arr::first(['a', 'b', 'c']));
    }

    /**
     * Test for last() method.
     *
     * @return void
     */
    public function testLast()
    {
        self::assertEquals(3, Arr::last([1, 2, 3]));
        self::assertEquals('c', Arr::last(['a', 'b', 'c']));
        self::assertNotEquals('b', Arr::last(['a', 'b', 'c']));

        self::assertEquals(2, Arr::last([1, 2, 3], function ($value) {
            return $value === 2;
        }));
        self::assertEquals(null, Arr::last([1, 2, 3], function ($value) {
            return $value === 20;
        }));

        self::assertInternalType('int', Arr::last([1, 2, 3]));
        self::assertInternalType('string', Arr::last(['a', 'b', 'c']));
    }
}
