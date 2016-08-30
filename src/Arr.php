<?php
/**********************************************************************************************************************
 *  Utils: A collection of useful PHP functions, mini classes and snippets that you need or could use every day.      *
 *                                                                                                                    *
 * @link      https://github.com/layershifter/utils                                                                  *
 *                                                                                                                    *
 * @copyright Copyright (c) 2016, Alexander Fedyashov                                                                *
 * @license   https://raw.githubusercontent.com/layershifter/utils/master/LICENSE Apache 2.0 License                 *
 **********************************************************************************************************************/

namespace LayerShifter\Utils;

/**
 * Helper class for work with arrays.
 *
 * Parts are taken from Illuminate/Support (https://github.com/illuminate/support) package.
 */
class Arr
{

    /**
     * Returns the first element in an array passing a given truth test.
     *
     * @param array         $array    Haystack array
     * @param null|callable $callback Optional callback function
     * @param mixed         $default  Default value if array element not found
     *
     * @return mixed
     */
    public static function first(array $array, callable $callback = null, $default = null)
    {
        if (null === $callback) {
            return count($array) === 0 ? Others::value($default) : reset($array);
        }

        foreach ($array as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                return $value;
            }
        }

        return Others::value($default);
    }

    /**
     * Returns the first key in an array passing a given truth test.
     *
     * @param array         $array    Haystack array
     * @param null|callable $callback Optional callback function
     * @param mixed         $default  Default value if array key not found
     *
     * @return int|string
     */
    public static function firstKey(array $array, callable $callback = null, $default = null)
    {
        if (null === $callback) {
            reset($array);
            $key = key($key);

            return null === $key ? Others::value($default) : $key;
        }

        foreach ($array as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                return $key;
            }
        }

        return Others::value($default);
    }

    /**
     * Returns the last element in an array passing a given truth test.
     *
     * @param array         $array    Haystack array
     * @param null|callable $callback Optional callback function
     * @param mixed         $default  Default value if array element not found
     *
     * @return mixed
     */
    public static function last(array $array, callable $callback = null, $default = null)
    {
        if (null === $callback) {
            return count($array) === 0 ? Others::value($default) : end($array);
        }

        return Arr::first(array_reverse($array, true), $callback, $default);
    }

    /**
     * Returns the last key in an array passing a given truth test.
     *
     * @param array         $array    Haystack array
     * @param null|callable $callback Optional callback function
     * @param mixed         $default  Default value if array key not found
     *
     * @return int|string
     */
    public static function lastKey(array $array, callable $callback = null, $default = null)
    {
        if (null === $callback) {
            end($array);
            $key = key($key);

            return null === $key ? Others::value($default) : $key;
        }

        return Arr::first(array_reverse($array, true), $callback, $default);
    }

    /**
     * Filters the array using the given callback.
     *
     * @param  array    $array    Haystack array
     * @param  callable $callback Callback function
     *
     * @return array
     */
    public static function where(array $array, callable $callback)
    {
        return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
    }
}
