<?php

namespace Myohanhtet\Libs;

class Flash
{
    public static function set($key, $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    public static function get($key)
    {
        $message = $_SESSION['flash'][$key] ?? null;
        unset($_SESSION['flash'][$key]); // Remove flash message after retrieval
        return $message;
    }
}