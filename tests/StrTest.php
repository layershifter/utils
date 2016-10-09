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

use LayerShifter\Utils\Str;

/**
 * Test cases for Str class.
 */
class StrTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test for cut() method.
     *
     * @return void
     */
    public function testCut()
    {
        $this->assertEquals('Ё', Str::cut('БГДЖИЛЁ', -1));
        $this->assertEquals('ЛЁ', Str::cut('БГДЖИЛЁ', -2));
        $this->assertEquals('И', Str::cut('БГДЖИЛЁ', -3, 1));
        $this->assertEquals('ДЖИЛ', Str::cut('БГДЖИЛЁ', 2, -1));
        $this->assertEmpty(Str::cut('БГДЖИЛЁ', 4, -4));
        $this->assertEquals('ИЛ', Str::cut('БГДЖИЛЁ', -3, -1));
        $this->assertEquals('ГДЖИЛЁ', Str::cut('БГДЖИЛЁ', 1));
        $this->assertEquals('ГДЖ', Str::cut('БГДЖИЛЁ', 1, 3));
        $this->assertEquals('БГДЖ', Str::cut('БГДЖИЛЁ', 0, 4));
        $this->assertEquals('Ё', Str::cut('БГДЖИЛЁ', -1, 1));
        $this->assertEmpty(Str::cut('Б', 2));
    }

    /**
     * Test for endsWith() method.
     *
     * @return void
     */
    public function testEndsWith()
    {
        $this->assertTrue(Str::endsWith('jason', 'on'));
        $this->assertTrue(Str::endsWith('jason', 'jason'));
        $this->assertTrue(Str::endsWith('jason', ['on']));
        $this->assertTrue(Str::endsWith('jason', ['no', 'on']));
        $this->assertFalse(Str::endsWith('jason', 'no'));
        $this->assertFalse(Str::endsWith('jason', ['no']));
        $this->assertFalse(Str::endsWith('jason', ''));
        $this->assertFalse(Str::endsWith('7', ' 7'));
    }

    /**
     * Test for length() method.
     *
     * @return void
     */
    public function testLength()
    {
        $this->assertEquals(11, Str::length('foo bar baz'));
    }

    /**
     * Test for pos() method.
     *
     * @return void
     */
    public function testPos()
    {
        $this->assertEquals(6, Str::pos('БГДЖИЛЁ', 'Ё'));
        $this->assertEquals(0, Str::pos('БГДЖИЛЁ', 'Б'));
        $this->assertEquals(0, Str::pos('ЁБГДЖИЛЁ', 'Ё'));
        $this->assertEquals(2, Str::pos('БГДЖИЛЁД', 'Д'));
        $this->assertFalse(Str::pos('БГДЖИЛЁ', 'П'));
    }

    /**
     * Test for startsWith() method.
     *
     * @return void
     */
    public function testStartsWith()
    {
        $this->assertTrue(Str::startsWith('jason', 'jas'));
        $this->assertTrue(Str::startsWith('jason', 'jason'));
        $this->assertTrue(Str::startsWith('jason', ['jas']));
        $this->assertTrue(Str::startsWith('jason', ['day', 'jas']));
        $this->assertFalse(Str::startsWith('jason', 'day'));
        $this->assertFalse(Str::startsWith('jason', ['day']));
        $this->assertFalse(Str::startsWith('jason', ''));
    }

    /**
     * Test for toLower() method.
     *
     * @return void
     */
    public function testToLower()
    {
        $this->assertEquals('foo bar baz', Str::toLower('FOO BAR BAZ'));
        $this->assertEquals('foo bar baz', Str::toLower('fOo Bar bAz'));
    }

    /**
     * Test for rPos() method.
     *
     * @return void
     */
    public function testRPos()
    {
        $this->assertEquals(6, Str::rPos('БГДЖИЛЁ', 'Ё'));
        $this->assertEquals(0, Str::rPos('БГДЖИЛЁ', 'Б'));
        $this->assertEquals(7, Str::rPos('ЁБГДЖИЛЁ', 'Ё'));
        $this->assertEquals(7, Str::rPos('БГДЖИЛЁД', 'Д'));
        $this->assertFalse(Str::rPos('БГДЖИЛЁ', 'П'));
    }
}
