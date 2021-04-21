<?php
namespace Core;

use Core\Exception\ActionNotFoundException;
use Core\Route;
use Core\Request;

/**
 * Router class that deals with routing all of the
 * get and post request inside the framework
 *
 * @package Core\Routing
 */
class Router {

    /**
     * Controller namespace
     */
    const CONTROLLER_NS = "App\Controllers";

    /**
     * Predefined routes that are available from the start. Will abstract
     * these into a class or YAML file in the future.
     */
    private $routes = [];

    private $request = null;

    public function __construct() {

        $this->request = new Request();

        $this->routes = [
            'GET' => [
                '/'      => new Route("/", "SiteController", "index"),
                '/hello' => new Route("/hello", "SiteController", "hello"),
            ],

            'POST'   => [],
        ];
    }


    /**
     * Get all of the routes for GET or POST
     *
     * @param string $method GET or POST
     *
     * @return array | boolean
     */
    public function routes($method='') {

        $method = strtoupper($method);

        if(empty($method) && isset($method)) {
            return $this->routes;
        }else if( $method == 'GET' || $method == 'POST' ) {
            return $this->routes[$method];
        }else {
            return false;
        }
    }

    /**
     * Add a GET uri endpoint to the router
     *
     * @param $uri The uri endpoint
     * @param $controller The name of the controller
     * @param $action The name of the action to use inside the controller
     *
     * @return bool
     */
    public function get($uri, $controller, $action) {

        if( array_key_exists($uri, $this->routes['GET']) ) {
            return false;
        }else {
            $this->routes['GET'][$uri] = [
                'controller' => $controller,
                'action' => $action,
            ];
            return true;
        }
    }

    /**
     * Add a POST uri endpoint to the router
     *
     * @param $uri The uri endpoint
     * @param $controller The name of the controller
     * @param $action The name of the action to use inside the controller
     *
     * @return bool
     */
    public function post($uri, $controller, $action) {

        if( array_key_exists($uri, $this->routes['POST']) ) {
            return false;
        }else {
            $this->routes['POST'][$uri] = [
                'controller' => $controller,
                'action' => $action,
            ];
            return true;
        }
    }

    /**
     * Resolve the corrected controller and action
     *
     * @throws ActionNotFoundException
     *
     * @return void
     */
    public function resolve() : void {

        dump($this->request);

        $uri = $this->request->getRequestUri();
        $method = $this->request->getRequestMethod();

        // If the current URI doesn't exist in the routes array
        // then we load the error controller and return
        if(! array_key_exists($uri, $this->routes[$method])) {
            $this->resolveErrorController();
            return;
        }

        $route = $this->routes[$method][$uri];
        $controller = $route->controller;
        $action = $route->action;

        $controller = self::CONTROLLER_NS . "\\" . $controller;
        $controller = new $controller();

        if (!method_exists($controller::class, $action)) {
            throw new ActionNotFoundException($action, $controller);
        } else
        {
            $controller->$action();
        }
    }

    /**
     * Resolve the name of the ErrorController class and 
     * call the index method of that object.
     *
     * @return void
     */
    public function resolveErrorController() : void
    {
        $controller = self::CONTROLLER_NS . "\\" . "ErrorController";
        $controller = new $controller();
        $controller->index();
    }
}

