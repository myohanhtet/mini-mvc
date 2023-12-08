<?php

namespace Myohanhtet\Config;

class View
{
    public static function render($view, $data = [],$status = 200)
    {
        http_response_code($status);
        extract($data);
        include __DIR__ . "/../Views/$view.php";
        exit();
    }
}