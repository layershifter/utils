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

use LayerShifter\Utils\DOM;

/**
 * Test cases for Str class.
 */
class DOMTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test for isComment() method.
     *
     * @return void
     */
    public function testIsComment()
    {
        static::assertTrue(DOM::isComment(new \DOMComment()));

        static::assertFalse(DOM::isComment(new \DOMElement('dummy')));
        static::assertFalse(DOM::isComment(new \DOMText()));
        static::assertFalse(DOM::isComment(new \DOMDocument()));
    }

    /**
     * Test for isDocument() method.
     *
     * @return void
     */
    public function testIsDocument()
    {
        static::assertTrue(DOM::isDocument(new \DOMDocument()));

        static::assertFalse(DOM::isDocument(new \DOMComment()));
        static::assertFalse(DOM::isDocument(new \DOMElement('dummy')));
        static::assertFalse(DOM::isDocument(new \DOMText()));
    }

    /**
     * Test for isElement() method.
     *
     * @return void
     */
    public function testIsElement()
    {
        static::assertTrue(DOM::isElement(new \DOMElement('dummy')));

        static::assertFalse(DOM::isElement(new \DOMComment()));
        static::assertFalse(DOM::isElement(new \DOMDocument()));
        static::assertFalse(DOM::isElement(new \DOMText()));
    }

    /**
     * Test for isText() method.
     *
     * @return void
     */
    public function testIsText()
    {
        static::assertTrue(DOM::isText(new \DOMText()));

        static::assertFalse(DOM::isText(new \DOMComment()));
        static::assertFalse(DOM::isText(new \DOMDocument()));
        static::assertFalse(DOM::isText(new \DOMElement('dummy')));
    }

    /**
     * Test for normalizeXPath() method.
     *
     * @return void
     */
    public function testNormalizeXPath()
    {
        static::assertEquals('/', DOM::normalizeXPath('/'));

        static::assertEquals('/body[1]', DOM::normalizeXPath('/body'));
        static::assertEquals('/body[1]/div[1]', DOM::normalizeXPath('/body/div'));
        static::assertEquals('/body[1]/div[1]', DOM::normalizeXPath('/body[1]/div'));
        static::assertEquals('/body[1]/div[1]', DOM::normalizeXPath('/body[1]/div[1]'));
    }
}
