<?php
/**********************************************************************************************************************
 * Utils: A collection of useful PHP functions, mini classes and snippets that you need or could use every day.       *
 *                                                                                                                    *
 * @link      https://github.com/layershifter/utils                                                                   *
 *                                                                                                                    *
 * @copyright Copyright (c) 2016, Alexander Fedyashov                                                                 *
 * @license   https://raw.githubusercontent.com/layershifter/utils/master/LICENSE Apache 2.0 License                  *
 **********************************************************************************************************************/

namespace LayerShifter\Utils;

/**
 * Helper class for work with strings.
 *
 * Parts are taken from Illuminate/Support (https://github.com/illuminate/support) package.
 */
class Str
{

    /**
     * @const string Encoding for strings.
     */
    const ENCODING = 'UTF-8';

//    TODO: New str functions
//
//    public function append() {
//
//    }
//
//    public function at() {
//
//    }
//

    /**
     * Checks if a given string contains with a given substring.
     *
     * @param string       $haystack
     * @param string|array $needles
     *
     * @return bool
     */
    public static function contains($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if (false !== Str::pos($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns the portion of string specified by the start and length parameters.
     *
     * @param string   $string
     * @param int      $start
     * @param int|null $length
     *
     * @return string
     */
    public static function cut($string, $start, $length = null)
    {
        return mb_substr($string, $start, $length, Str::ENCODING);
    }

    /**
     * Determines if a given string ends with a given substring.
     *
     * @param string       $haystack
     * @param string|array $needles
     *
     * @return bool
     */
    public static function endsWith($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ((string)$needle === Str::cut($haystack, -Str::length($needle))) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns the length of the given string.
     *
     * @param string $value
     *
     * @return int
     */
    public static function length($value)
    {
        return mb_strlen($value, Str::ENCODING);
    }

    /**
     * Finds position of first occurrence of string in a string.
     *
     * @param string $haystack
     * @param string $needle
     * @param int    $offset
     *
     * @return bool|int
     */
    public static function pos($haystack, $needle, $offset = 0)
    {
        return mb_strpos($haystack, $needle, $offset, Str::ENCODING);
    }

//    TODO: New str functions
//
//    public function replace() {
//
//    }
//

    /**
     * Splits the string with the provided delimiter.
     *
     * @param string   $haystack
     * @param string   $delimiter
     * @param null|int $limit
     *
     * @return array
     */
    public static function split($haystack, $delimiter, $limit = null)
    {
        if ($limit === 0) {
            return [];
        }

        return explode($delimiter, $haystack, $limit);
    }

//
//    public function substr() {
//
//    }

    /**
     * Determines if a given string starts with a given substring.
     *
     * @param string       $haystack
     * @param string|array $needles
     *
     * @return boolean
     */
    public static function startsWith($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle !== '' && mb_strpos($haystack, $needle, 0, Str::ENCODING) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Converts the given string to lower-case.
     *
     * @param string $value
     *
     * @return string
     */
    public static function toLower($value)
    {
        return mb_strtolower($value, Str::ENCODING);
    }

    /**
     * Finds position of last occurrence of a string in a string.
     *
     * @param string $haystack
     * @param string $needle
     * @param int    $offset
     *
     * @return bool|int
     */
    public static function rPos($haystack, $needle, $offset = 0)
    {
        return mb_strrpos($haystack, $needle, $offset, Str::ENCODING);
    }
}
