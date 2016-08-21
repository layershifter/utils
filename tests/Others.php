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

use LayerShifter\Utils\Others;

/**
 * Test cases for Others class.
 */
class OthersTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test for value() method.
     *
     * @return void
     */
    public function testValue()
    {
        self::assertEquals(1, Others::value(1));
        self::assertInternalType('int', Others::value(1));

        self::assertEquals(2, Others::value(function () {
            return 2;
        }));
        self::assertInternalType('int', Others::value(function () {
            return 2;
        }));
    }
}
