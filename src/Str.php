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

    /**
     * Appends a given string with a given substring.
     *
     * @param string       $haystack
     * @param string|array $values
     *
     * @return string
     */
    public static function append($haystack, $values)
    {
        foreach ((array)$values as $value) {
            $haystack .= $value;
        }

        return $haystack;
    }

    /**
     * Returns the character at given index in a given string.
     *
     * @param string $haystack
     * @param int    $index
     *
     * @return string
     */
    public static function at($haystack, $index)
    {
        return Str::substr($haystack, $index, 1);
    }

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

    /**
     * Prepends a given string with a given substring.
     *
     * @param string       $haystack
     * @param string|array $values
     *
     * @return string
     */
    public static function prepend($haystack, $values)
    {
        $prefix = '';

        foreach ((array)$values as $value) {
            $prefix .= $value;
        }

        return $prefix . $haystack;
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

    /**
     * Returns the substring beginning at given position with a given length.
     *
     * @param string $haystack
     * @param int    $start
     * @param int    $length
     *
     * @return string
     */
    public static function substr($haystack, $start, $length = null)
    {
        return mb_substr($haystack, $start, $length, Str::ENCODING);
    }

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
     * Returns a repeated string given a multiplier.
     *
     * @param string $haystack
     * @param int    $multiplier
     *
     * @return string
     */
    public static function repeat($haystack, $multiplier)
    {
        if ($multiplier < 0) {
            return '';
        }

        return str_repeat($haystack, $multiplier);
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
