<?php
namespace Core;

/**
 * Simple service container to the application
 */
class Container {

    private $services = [];
    
    /**
     * Make a service available to the container
     */
    public function bind($service_name, $class_binding) {
        $this->services[$service_name] = [$service_name => $class_binding];
    }

    /**
     * Get a service from the container
     */
    public function get($service_name) {
        return $this->services[$service_name] ?? "Not Found";
    }
}


