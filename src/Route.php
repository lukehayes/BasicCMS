<?php
namespace Core;

/**
 * This class represents a route/endpoint inside the application.
 */
class Route
{
    /**
     * URI that the route is defined for.
     *
     * @var string.
     * @access public.
     */
    public $path;

    /**
     * Controller class that the route is defined for.
     *
     * @var string.
     * @access public.
     */
    public $controller;

    /**
     * Action method to call on the $controller member.
     *
     * @var string.
     * @access public.
     */
    public $action;
    
    public function __construct(string $path, string $controller, $action)
    {
        $this->path = $path;
        $this->controller = $controller;
        $this->action = $action;
    }
}
