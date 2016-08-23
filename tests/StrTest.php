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
        self::assertEquals('Ё', Str::cut('БГДЖИЛЁ', -1));
        self::assertEquals('ЛЁ', Str::cut('БГДЖИЛЁ', -2));
        self::assertEquals('И', Str::cut('БГДЖИЛЁ', -3, 1));
        self::assertEquals('ДЖИЛ', Str::cut('БГДЖИЛЁ', 2, -1));
        self::assertEmpty(Str::cut('БГДЖИЛЁ', 4, -4));
        self::assertEquals('ИЛ', Str::cut('БГДЖИЛЁ', -3, -1));
        self::assertEquals('ГДЖИЛЁ', Str::cut('БГДЖИЛЁ', 1));
        self::assertEquals('ГДЖ', Str::cut('БГДЖИЛЁ', 1, 3));
        self::assertEquals('БГДЖ', Str::cut('БГДЖИЛЁ', 0, 4));
        self::assertEquals('Ё', Str::cut('БГДЖИЛЁ', -1, 1));
        self::assertEmpty(Str::cut('Б', 2));
    }

    /**
     * Test for endsWith() method.
     *
     * @return void
     */
    public function testEndsWith()
    {
        self::assertTrue(Str::endsWith('jason', 'on'));
        self::assertTrue(Str::endsWith('jason', 'jason'));
        self::assertTrue(Str::endsWith('jason', ['on']));
        self::assertTrue(Str::endsWith('jason', ['no', 'on']));
        self::assertFalse(Str::endsWith('jason', 'no'));
        self::assertFalse(Str::endsWith('jason', ['no']));
        self::assertFalse(Str::endsWith('jason', ''));
        self::assertFalse(Str::endsWith('7', ' 7'));
    }

    /**
     * Test for length() method.
     *
     * @return void
     */
    public function testLength()
    {
        self::assertEquals(11, Str::length('foo bar baz'));
    }

    /**
     * Test for pos() method.
     *
     * @return void
     */
    public function testPos()
    {
        self::assertEquals(6, Str::pos('БГДЖИЛЁ', 'Ё'));
        self::assertEquals(0, Str::pos('БГДЖИЛЁ', 'Б'));
        self::assertEquals(0, Str::pos('ЁБГДЖИЛЁ', 'Ё'));
        self::assertEquals(2, Str::pos('БГДЖИЛЁД', 'Д'));
        self::assertFalse(Str::pos('БГДЖИЛЁ', 'П'));
    }

    /**
     * Test for startsWith() method.
     *
     * @return void
     */
    public function testStartsWith()
    {
        self::assertTrue(Str::startsWith('jason', 'jas'));
        self::assertTrue(Str::startsWith('jason', 'jason'));
        self::assertTrue(Str::startsWith('jason', ['jas']));
        self::assertTrue(Str::startsWith('jason', ['day', 'jas']));
        self::assertFalse(Str::startsWith('jason', 'day'));
        self::assertFalse(Str::startsWith('jason', ['day']));
        self::assertFalse(Str::startsWith('jason', ''));
    }

    /**
     * Test for toLower() method.
     *
     * @return void
     */
    public function testToLower()
    {
        self::assertEquals('foo bar baz', Str::toLover('FOO BAR BAZ'));
        self::assertEquals('foo bar baz', Str::toLover('fOo Bar bAz'));
    }

    /**
     * Test for rPos() method.
     *
     * @return void
     */
    public function testRPos()
    {
        self::assertEquals(6, Str::rPos('БГДЖИЛЁ', 'Ё'));
        self::assertEquals(0, Str::rPos('БГДЖИЛЁ', 'Б'));
        self::assertEquals(7, Str::rPos('ЁБГДЖИЛЁ', 'Ё'));
        self::assertEquals(7, Str::rPos('БГДЖИЛЁД', 'Д'));
        self::assertFalse(Str::rPos('БГДЖИЛЁ', 'П'));
    }
}
