<?php

/**
 * Class Model
 */
class Model
{
    /**
     * @param array $data
     */
    public function __construct($data = array())
    {
        foreach ($data as $k => $v) {
            $this->{$k} = $v;
        }
    }
}
