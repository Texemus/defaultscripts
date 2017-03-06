<?php

namespace App\Classes;

use Auth;

/**
 * Class PermissionChecker
 * @package App\Classes
 */
class PermissionChecker
{

    /**
     * @author Chilion Snoek <c.snoek@texemus.com>
     *
     * @param $role
     * @return bool
     *
     */
    public static function role($role)
    {
        return Auth::user()->roles->pluck("name")->contains(strtolower($role));
    }

    /**
     * @author Chilion Snoek <c.snoek@texemus.com>
     *
     * @package
     * @version 1.0
     *
     * @param $name (edit,delete,create,see,rate)
     * @param $arguments
     * @return bool
     *
     */
    public static function __callStatic($name, $arguments)
    {
        $object = $arguments[0];

        if (Auth::user()->super_user) {
            return true;
        }

        return Auth::user()->roles->pluck('rights')->flatten()->filter(function ($right) use ($object) {
            return $right->object === $object;
        })->pluck($name)->contains(1);
    }
}
