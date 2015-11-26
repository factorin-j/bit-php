<?php

/**
 * Class Request
 */
class Request
{
    /**
     * @param $key
     * @param string $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }

    /**
     * @return array
     */
    public static function all()
    {
        return isset($_REQUEST) ? $_REQUEST : array();
    }
}
