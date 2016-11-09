<?php
/**********************************************************************************************************************
 * Utils: A collection of useful PHP functions, mini classes and snippets that you need or could use every day.       *
 *                                                                                                                    *
 * @link      https://github.com/layershifter/utils                                                                   *
 *                                                                                                                    *
 * @copyright Copyright (c) 2016, Alexander Fedyashov                                                                 *
 * @license   https://raw.githubusercontent.com/layershifter/utils/master/LICENSE Apache 2.0 License                  *
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
        $this->assertEquals(null, Arr::first([]));
        $this->assertEquals(1, Arr::first([1, 2, 3]));
        $this->assertEquals('a', Arr::first(['a', 'b', 'c']));
        $this->assertNotEquals('b', Arr::first(['a', 'b', 'c']));

        $this->assertEquals(2, Arr::first([1, 2, 3], function ($value) {
            return $value === 2;
        }));
        $this->assertEquals(null, Arr::first([1, 2, 3], function ($value) {
            return $value === 20;
        }));

        $this->assertInternalType('int', Arr::first([1, 2, 3]));
        $this->assertInternalType('string', Arr::first(['a', 'b', 'c']));
    }

    /**
     * Test for firstKey() method.
     *
     * @return void
     */
    public function testFirstKey()
    {
        $this->assertEquals(null, Arr::firstKey([]));

        // Test on basic array.

        $this->assertEquals(0, Arr::firstKey([1, 2, 3]));
        $this->assertEquals(0, Arr::firstKey(['a', 'b', 'c']));
        $this->assertNotEquals(1, Arr::firstKey(['a', 'b', 'c']));

        $this->assertEquals(1, Arr::firstKey([1, 2, 3], function ($value) {
            return $value === 2;
        }));
        $this->assertEquals(null, Arr::firstKey([1, 2, 3], function ($value) {
            return $value === 20;
        }));

        $this->assertInternalType('int', Arr::firstKey([1, 2, 3]));
        $this->assertInternalType('int', Arr::firstKey(['a', 'b', 'c']));

        // Test on assoc array.

        $this->assertEquals(1, Arr::firstKey([1 => null, 2 => null, 3 => null]));
        $this->assertEquals('a', Arr::firstKey(['a' => null, 'b' => null, 'c' => null]));
        $this->assertNotEquals('b', Arr::firstKey(['a' => null, 'b' => null, 'c' => null]));

        $this->assertEquals(2, Arr::firstKey([1 => null, 2 => null, 3 => null], function ($value, $key) {
            return $value === null && $key === 2;
        }));
        $this->assertEquals(null, Arr::firstKey([1 => null, 2 => null, 3 => null], function ($value) {
            return $value !== null;
        }));

        $this->assertInternalType('int', Arr::firstKey([1 => null, 2 => null, 3 => null]));
        $this->assertInternalType('string', Arr::firstKey(['a' => null, 'b' => null, 'c' => null]));
    }

    /**
     * Test for last() method.
     *
     * @return void
     */
    public function testLast()
    {
        $this->assertEquals(3, Arr::last([1, 2, 3]));
        $this->assertEquals('c', Arr::last(['a', 'b', 'c']));
        $this->assertNotEquals('b', Arr::last(['a', 'b', 'c']));

        $this->assertEquals(2, Arr::last([1, 2, 3], function ($value) {
            return $value === 2;
        }));
        $this->assertEquals(null, Arr::last([1, 2, 3], function ($value) {
            return $value === 20;
        }));

        $this->assertInternalType('int', Arr::last([1, 2, 3]));
        $this->assertInternalType('string', Arr::last(['a', 'b', 'c']));
    }

    /**
     * Test for lastKey() method.
     *
     * @return void
     */
    public function testLastKey()
    {
        // Test on basic array.

        $this->assertEquals(2, Arr::lastKey([1, 2, 3]));
        $this->assertEquals(2, Arr::lastKey(['a', 'b', 'c']));
        $this->assertNotEquals(1, Arr::lastKey(['a', 'b', 'c']));

        $this->assertEquals(1, Arr::lastKey([1, 2, 3], function ($value) {
            return $value === 2;
        }));
        $this->assertEquals(null, Arr::lastKey([1, 2, 3], function ($value) {
            return $value === 20;
        }));

        $this->assertInternalType('int', Arr::lastKey([1, 2, 3]));
        $this->assertInternalType('int', Arr::lastKey(['a', 'b', 'c']));

        // Test on assoc array.

        $this->assertEquals(3, Arr::lastKey([1 => null, 2 => null, 3 => null]));
        $this->assertEquals('c', Arr::lastKey(['a' => null, 'b' => null, 'c' => null]));
        $this->assertNotEquals('b', Arr::lastKey(['a' => null, 'b' => null, 'c' => null]));

        $this->assertEquals(2, Arr::lastKey([1 => null, 2 => null, 3 => null], function ($value, $key) {
            return $value === null && $key === 2;
        }));
        $this->assertEquals(null, Arr::lastKey([1 => null, 2 => null, 3 => null], function ($value) {
            return $value !== null;
        }));

        $this->assertInternalType('int', Arr::lastKey([1 => null, 2 => null, 3 => null]));
        $this->assertInternalType('string', Arr::lastKey(['a' => null, 'b' => null, 'c' => null]));
    }

    /**
     * Test for sort() method.
     *
     * @return void
     */
    public function testSort()
    {
        $unsorted = [
            ['name' => 'Desk'],
            ['name' => 'Chair'],
        ];
        $expected = [
            ['name' => 'Chair'],
            ['name' => 'Desk'],
        ];
        $sorted = array_values(Arr::sort($unsorted, function ($value) {
            return $value['name'];
        }));

        $this->assertEquals($expected, $sorted);
    }


    /**
     * Test for where() method.
     *
     * @return void
     */
    public function testWhere()
    {
        $array = [100, '200', 300, '400', 500];
        $array = Arr::where($array, function ($value) {
            return is_string($value);
        });

        $this->assertEquals([1 => '200', 3 => '400'], $array);

        $array = [100, '200', 300, '400', 500];
        $array = Arr::where($array, function ($value) {
            return is_int($value);
        });

        $this->assertEquals([0 => 100, 2 => 300, 4 => 500], $array);
    }
}
