<?php
namespace Core;

class Router {

    private $routes = [];

    public function __construct(){
        $this->routes['get'] = [];
        $this->routes['post'] = [];
    }

    /**
     * Add a get route to the router
     *
     * @param $path The endpoint for a GET request
     * @param $controller The name of the controller
     *
     * @return void
     */
    public function get($path, $controller) : void {
        $route = [$path => $controller];
        $this->routes['get'][] = $route;
    }

    /**
     * Add a POST route to the router
     *
     * @param $path The endpoint for a POST request
     * @param $controller The name of the controller
     *
     * @return void
     */
    public function post($path, $controller) : void {
        $route = [$path => $controller];
        $this->routes['post'][] = $route;
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
