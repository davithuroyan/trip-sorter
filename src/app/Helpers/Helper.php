<?php

namespace app\Helpers;

/**
 * Class Helper
 * @package app\Helpers
 */
class Helper
{
    /**
     * @param array $array
     * @param array $keys
     * @return bool
     */
    public static function arrayKeysExists(array $array, array $keys): bool
    {
        return 0 === count(array_diff($keys, array_keys($array)));
    }
}