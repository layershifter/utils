<?php
/**********************************************************************************************************************
 *  Utils: A collection of useful PHP functions, mini classes and snippets that you need or could use every day.      *
 *                                                                                                                    *
 *  @link      https://github.com/layershifter/utils                                                                  *
 *                                                                                                                    *
 *  @copyright Copyright (c) 2016, Alexander Fedyashov                                                                *
 *  @license   https://raw.githubusercontent.com/layershifter/utils/master/LICENSE Apache 2.0 License                 *
 **********************************************************************************************************************/

namespace LayerShifter\Utils;

/**
 * Helper class for work with IP addresses.
 */
class IP
{

    /**
     * Check if the input is a valid IP address. Recognizes both IPv4 and IPv6 addresses.
     *
     * @param string $hostname Hostname that will be checked
     *
     * @return boolean
     */
    public static function isValid($hostname)
    {
        $hostname = trim($hostname);

        // Strip the wrapping square brackets from IPv6 addresses.

        if (Str::startsWith($hostname, '[') && Str::endsWith($hostname, ']')) {
            $hostname = substr($hostname, 1, -1);
        }

        return (bool)filter_var($hostname, FILTER_VALIDATE_IP);
    }
}
