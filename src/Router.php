<?php
namespace Core;

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
    const CONTROLLER_NS = "Controllers";

    private $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct() {}
    
    /**
     * Return the $_SERVER['REQUEST_URI'] array value
     *
     * @return string
     */
    private function getUri() : string {
        return $_SERVER['REQUEST_URI'] ?? "/";
    }
    
    /**
     * Get the REQUEST_METHOD from $_SERVER array
     *
     * @return array
     */
    private function getRequestMethod() : string {
        return  $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Split the current REQUEST_URI into controller
     * and action components
     *
     * @return array
     */
    private function getUriPieces() : array {
        return explode("/", $_SERVER['REQUEST_URI']);
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
     * @return void
     */
    public function resolve() : void {

        $uri = $this->getUri();
        $method = $this->getRequestMethod();
        
        // If the current URI doesn't exist in the routes array
        // then we load the error controller and return
        if(! array_key_exists($uri, $this->routes[$method])) {
            $controller = self::CONTROLLER_NS . "\\" . "ErrorController";
            $controller = new $controller();
            $controller->index();
            return;
        }

        $route = $this->routes[$method][$uri];
        $controller = $route['controller'];
        $action = $route['action'];

        $controller = self::CONTROLLER_NS . "\\" . $route['controller'];
        $controller = new $controller();
        $controller->$action();
    }
}

