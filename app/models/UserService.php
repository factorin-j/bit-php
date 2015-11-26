<?php

/**
 * Class UserService
 */
class UserService
{
    /**
     * @param $name
     * @return User
     */
    public static function createUserByName($name)
    {
        $data = array('name' => $name);
        return new User($data);
    }
}
