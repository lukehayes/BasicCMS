<?php
namespace Core;

use Core\Exception\ServiceNotFoundException;

/**
 * Simple service container to the application
 */
class ServiceContainer {

    private $services = [];
    
    /**
     * Make a service available to the container
     */
    public function bind($service_name, $class_binding) {
        $this->services[$service_name] = [$service_name => $class_binding];
    }

    /**
     * Get a service from the container
     * 
     * @throws ServiceNotFoundException
     */
    public function get($service_name) {

        $service = $this->services[$service_name];

        if( ! $service ) {
            throw new ServiceNotFoundException("Service could not be found.");
        }


        return $this->services[$service_name] ?? "Not Found";
    }
}


