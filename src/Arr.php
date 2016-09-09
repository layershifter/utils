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
            if (count($array) === 0) {
                return Others::value($default);
            }

            // Using foreach() instead of reset() for performance.
            // https://bugs.php.net/bug.php?id=72745

            foreach ($array as $value) {
                return $value;
            }
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
            if (count($array) === 0) {
                return Others::value($default);
            }

            // Using foreach() instead of reset() for performance.
            // https://bugs.php.net/bug.php?id=72745

            foreach ($array as $key => $value) {
                return $key;
            }
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
            $key = key($array);

            return null === $key ? Others::value($default) : $key;
        }

        return Arr::firstKey(array_reverse($array, true), $callback, $default);
    }

    /**
     * Sorts the array using the given callback.
     *
     * @param array    $array    Haystack array
     * @param callable $callback Optional callback function
     *
     * @return array
     */
    public static function sort(array $array, $callback)
    {
        $results = [];

        // First we will loop through the items and get the comparator from a callback
        // function which we were given. Then, we will sort the returned values and
        // and grab the corresponding values for the sorted keys from this array.

        foreach ($array as $key => $value) {
            $results[$key] = $callback($value, $key);
        }

        asort($results);

        // Once we have sorted all of the keys in the array, we will loop through them
        // and grab the corresponding model so we can set the underlying items list
        // to the sorted version. Then we'll just return the collection instance.

        foreach (array_keys($results) as $key) {
            $results[$key] = $array[$key];
        }

        return $results;
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
        // Fallback for PHP 5.5 and HHVM, because they don't support ARRAY_FILTER_USE_BOTH.
        // @see http://php.net/manual/en/function.array-filter.php

        if (defined('HHVM_VERSION') || !defined('ARRAY_FILTER_USE_BOTH')) {
            $filtered = [];

            foreach ($array as $key => $value) {
                if (call_user_func($callback, $key, $value)) {
                    $filtered[$key] = $value;
                }
            }

            return $filtered;
        }

        return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
    }
}
