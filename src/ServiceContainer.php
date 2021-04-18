<?php
namespace Core;

use Core\Exception\ServiceNotFoundException;

/**
 * Simple service container to the application
 */
class ServiceContainer {

    private $services = [];
    
    /**
     * Make a service available inside the container.
     *
     * @param string $name  Name of the service to be bound. 
     * @param object $class Class to be added into the container.
     *
     * @return void.
     */
    public function bind(string $name, object $class) {
        $this->services[$name] = [$name => $class];
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


