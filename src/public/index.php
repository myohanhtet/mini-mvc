<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
$routes = include '../route.php';
date_default_timezone_set(config('timezone'));
$request_uri = $_SERVER['REQUEST_URI'];
$route = getMatchingRoute($request_uri, $routes);

if ($route) {
    //auth check
    $authRequired = $route['auth'] ?? true;
    if ($authRequired && !isset($_SESSION['user_id'])) {
        redirect('/login');
    }
    check_session_time();
    list($controller, $action) = explode('@', $route['controller']);
    $controllerInstance = new $controller();
    //$controllerInstance->$action();
    call_user_func_array([$controllerInstance, $action], $route['params']);
} else {
    //Todo : create error page
    echo "404 Not Found";
}

function getMatchingRoute($request_uri, $routes) {
    foreach ($routes as $uriPattern => $route) {
        $patternRegex = preg_replace('/\{([a-zA-Z]+)\}/', '([^\/]+)', $uriPattern);
        if (preg_match('#^' . $patternRegex . '$#', $request_uri, $matches)) {
            $route['params'] = array_slice($matches, 1); // Extract matched parameters
            return $route;
        }
    }
    return null;
}
