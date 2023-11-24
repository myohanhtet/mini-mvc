<?php

namespace Myohanhtet\Config;

class View
{
    public static function render($view, $data = [])
    {
        extract($data);
        include __DIR__ . "/../Views/$view.php";
        exit();
    }
}