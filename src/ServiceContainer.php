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
     * Get a service from the container.
     * 
     * @param string $name  Name of the service to be retrieved. 
     *
     * @throws ServiceNotFoundException Thrown if $name is not
     * available inside the container.
     *
     * @return void.
     */
    public function get(string $name) {

        $service = $this->services[$name];

        if( ! $service ) {
            throw new ServiceNotFoundException("Service could not be found.");
        }

        return $this->services[$name] ?? "Not Found";
    }
}


