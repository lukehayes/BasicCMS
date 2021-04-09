<?php
namespace Core\Exception;

/**
 * Thrown when the service container can't find a service
 */
class ServiceNotFoundException extends \Exception {

    public function __construct($message) {
        parent::__construct($message);
    }
}
