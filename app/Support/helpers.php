<?php

if (!function_exists('user')) {

    function user($driver = null)
    {
        $user = app('auth')->guard($driver)->user();

        return $user;
    }
}