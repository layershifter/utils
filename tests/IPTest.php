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

use LayerShifter\Utils\IP;

/**
 * Test cases for IP class.
 */
class IPTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test for isValid() method.
     *
     * @return void
     */
    public function testIsValid()
    {
        // IPv4 test cases.

        $this->assertTrue(IP::isValid('200.200.200.200'));
        $this->assertTrue(IP::isValid(' 200.200.200.200'));
        $this->assertTrue(IP::isValid('200.200.200.200 '));
        $this->assertTrue(IP::isValid('0.0.0.0'));
        $this->assertTrue(IP::isValid('255.255.255.255'));

        $this->assertFalse(IP::isValid('00.00.00.00'));
        $this->assertFalse(IP::isValid('100.100.020.100'));
        $this->assertFalse(IP::isValid('-1.0.0.0'));
        $this->assertFalse(IP::isValid('200.200.256.200'));
        $this->assertFalse(IP::isValid('200.200.200.200.'));
        $this->assertFalse(IP::isValid('200.200.200'));
        $this->assertFalse(IP::isValid('200.200.200.2d0'));
        $this->assertFalse(IP::isValid('200000000000000000000000000000000000000000000000000000.200.200.200'));

        // IPv6 test cases.

        $this->assertTrue(IP::isValid('00AB:0002:3008:8CFD:00AB:0002:3008:8CFD'));
        $this->assertTrue(IP::isValid('00ab:0002:3008:8cfd:00ab:0002:3008:8cfd'));
        $this->assertTrue(IP::isValid('00aB:0002:3008:8cFd:00Ab:0002:3008:8cfD'));
        $this->assertTrue(IP::isValid('AB:02:3008:8CFD:AB:02:3008:8CFD'));
        $this->assertTrue(IP::isValid('AB:02:3008:8CFD::02:3008:8CFD'));
        $this->assertTrue(IP::isValid('::'));
        $this->assertTrue(IP::isValid('0::'));
        $this->assertTrue(IP::isValid('0::0'));

        $this->assertFalse(IP::isValid('00AB:00002:3008:8CFD:00AB:0002:3008:8CFD'));
        $this->assertFalse(IP::isValid(':0002:3008:8CFD:00AB:0002:3008:8CFD'));
        $this->assertFalse(IP::isValid('00AB:0002:3008:8CFD:00AB:0002:3008:'));
        $this->assertFalse(IP::isValid('AB:02:3008:8CFD:AB:02:3008:8CFD:02'));
        $this->assertFalse(IP::isValid('AB:02:3008:8CFD::02:3008:8CFD:02'));
        $this->assertFalse(IP::isValid('AB:02:3008:8CFD::02::8CFD'));
        $this->assertFalse(IP::isValid('GB:02:3008:8CFD:AB:02:3008:8CFD'));
        $this->assertFalse(IP::isValid('00000000000005.10.10.10'));
        $this->assertFalse(IP::isValid('2:::3'));

        $this->assertTrue(IP::isValid('[AB:02:3008:8CFD::02:3008:8CFD]'));
        $this->assertTrue(IP::isValid('[::]'));
        $this->assertTrue(IP::isValid('[::1]'));

        $this->assertFalse(IP::isValid('[AB:02:3008:8CFD::02:3008:8CFD'));
        $this->assertFalse(IP::isValid('::]'));
        $this->assertFalse(IP::isValid('/[::1]'));

        // Domain test cases.

        $this->assertFalse(IP::isValid('google.com'));
        $this->assertFalse(IP::isValid('.google.com'));
        $this->assertFalse(IP::isValid('www.google.com'));
        $this->assertFalse(IP::isValid('com'));
    }
}
