<?php
namespace Core;

class Router {

    private $routes = [];

    public function __construct(){
        $this->routes['get'] = [];
        $this->routes['post'] = [];
    }

    /**
     * Add a GET route to the router
     *
     * @param $path The endpoint for a GET request
     * @param $controller The name of the controller
     *
     * @return bool False if path already exists, True otheriwse
     */
    public function get($path, $controller) : bool {
        if( array_key_exists($path, $this->routes['get'])) {
            return false;
        }else {
            $this->routes['get'][$path] = $controller;
            return true;
        }
    }

    /**
     * Add a POST route to the router
     *
     * @param $path The endpoint for a POST request
     * @param $controller The name of the controller
     *
     * @return bool False if path already exists, True otheriwse
     */
    public function post($path, $controller) : bool {
        if( array_key_exists($path, $this->routes['post'])) {
            return false;
        }else {
            $this->routes['post'][$path] = $controller;
            return true;
        }
    }

    /**
     * Routes array getter
     *
     * @return array
     */
    public function getRoutes() : array {
        return $this->routes;
    }

}

?>
