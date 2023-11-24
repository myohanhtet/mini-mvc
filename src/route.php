<?php

use Myohanhtet\Controller\AuthController;
use Myohanhtet\Controller\DashboardController;
use Myohanhtet\Controller\HomeController;
use Myohanhtet\Controller\UserController;

/**
 * Todo : resource route
 */
return [

    '/' => [
        'controller' => HomeController::class.'@index',
        'auth' => false,
    ],
    '/dashboard' => [
        'controller' => DashboardController::class.'@index',
    ],
    '/login' => [
        'controller' => AuthController::class.'@login',
        'auth' => false,
    ],
    '/logout' => [
        'controller' => AuthController::class.'@logout',
        'auth' => false,
    ],
    '/login/post' => [
        'controller' => AuthController::class.'@store',
        'auth' => false,
    ],

    //users
    '/users' => [
        'controller' => UserController::class . '@index',
    ],
    '/users/{id}/show' => [
        'controller' => UserController::class . '@show',
    ],
    '/users/create' => [
        'controller' => UserController::class . '@create',
    ],
    '/users/store' => [
        'controller' => UserController::class . '@store',
    ],
    '/users/{id}/edit' => [
        'controller' => UserController::class . '@edit',
    ],
    '/users/{id}/update' => [
        'controller' => UserController::class . '@update',
    ],
    '/users/{id}/delete' => [
        'controller' => UserController::class . '@delete',
    ]
];