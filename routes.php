<?php
use Core\Route;
/**
 * Routes for most of the application are stored here.
 */
return [
    'GET' => [
        '/'      => new Route("/", SiteController::class, "index"),
        '/hello' => new Route("/hello", SiteController::class, "hello"),
        '/login' => new Route("/login", SiteController::class, "login"),
    ],

    'POST'   => [
        '/login' => new Route("/login", LoginController::class, "process"),
    ],
];
