<?php

if (!function_exists('dd')) {
    function dd(...$args)
    {
        echo '<div style="background-color: #f8f9fa; padding: 10px; border: 1px solid #d6d8db;">';
        echo '<pre>';
        foreach ($args as $arg) {
            var_dump($arg);
        }
        echo '</pre>';
        echo '</div>';
        die();
    }
}

if (!function_exists('redirect')) {
    function redirect($url)
    {
        header("Location: $url");
        exit();
    }
}

if (!function_exists('isRouteActive')) {
    function isRouteActive($routeName): bool
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        return str_contains($request_uri, $routeName);
    }
}

if (!function_exists('config')) {
    function config($key, $default = null)
    {
        $keys = explode('.', $key);
        $config = include __DIR__ . '/config.php';
        foreach ($keys as $part) {
            if (isset($config[$part])) {
                $config = $config[$part];
            } else {
                return $default;
            }
        }
        return $config;
    }
}

if (!function_exists('check_session_time')) {
    function check_session_time(): void
    {
        if (isset($_SESSION['session_time']) && (time() - $_SESSION['session_time']) > config('session')) {
            // If session is inactive for more than the timeout period, destroy the session
            session_unset();
            session_destroy();
            redirect('/login');
        } else {
            $_SESSION['session_time'] = time();
        }
    }
}

if (!function_exists('url_encrypt_id')) {
    function url_encrypt_id($id): string
    {
      $encryId =  \Myohanhtet\Libs\Encryption::encrypt($id);
      return urlencode($encryId);
    }
}
