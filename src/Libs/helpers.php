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
        $config = include __DIR__ . '/../Config/config.php';
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

if (!function_exists('http_response_code')) {
    function http_response_code($code = NULL) {

        if ($code !== NULL) {
            switch ($code) {
                case 100: $text = 'Continue'; break;
                case 101: $text = 'Switching Protocols'; break;
                case 200: $text = 'OK'; break;
                case 201: $text = 'Created'; break;
                case 202: $text = 'Accepted'; break;
                case 203: $text = 'Non-Authoritative Information'; break;
                case 204: $text = 'No Content'; break;
                case 205: $text = 'Reset Content'; break;
                case 206: $text = 'Partial Content'; break;
                case 300: $text = 'Multiple Choices'; break;
                case 301: $text = 'Moved Permanently'; break;
                case 302: $text = 'Moved Temporarily'; break;
                case 303: $text = 'See Other'; break;
                case 304: $text = 'Not Modified'; break;
                case 305: $text = 'Use Proxy'; break;
                case 400: $text = 'Bad Request'; break;
                case 401: $text = 'Unauthorized'; break;
                case 402: $text = 'Payment Required'; break;
                case 403: $text = 'Forbidden'; break;
                case 404: $text = 'Not Found'; break;
                case 405: $text = 'Method Not Allowed'; break;
                case 406: $text = 'Not Acceptable'; break;
                case 407: $text = 'Proxy Authentication Required'; break;
                case 408: $text = 'Request Time-out'; break;
                case 409: $text = 'Conflict'; break;
                case 410: $text = 'Gone'; break;
                case 411: $text = 'Length Required'; break;
                case 412: $text = 'Precondition Failed'; break;
                case 413: $text = 'Request Entity Too Large'; break;
                case 414: $text = 'Request-URI Too Large'; break;
                case 415: $text = 'Unsupported Media Type'; break;
                case 500: $text = 'Internal Server Error'; break;
                case 501: $text = 'Not Implemented'; break;
                case 502: $text = 'Bad Gateway'; break;
                case 503: $text = 'Service Unavailable'; break;
                case 504: $text = 'Gateway Time-out'; break;
                case 505: $text = 'HTTP Version not supported'; break;
                default:
                    exit('Unknown http status code "' . htmlentities($code) . '"');
                    break;
            }

            $protocol = ($_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/2.0');

            header($protocol . ' ' . $code . ' ' . $text);

            $GLOBALS['http_response_code'] = $code;

        } else {

            $code = ($GLOBALS['http_response_code'] ?? 200);

        }

        return $code;

    }
}
