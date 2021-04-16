<?php
namespace Core\Exception;

/**
 * Thrown when an action is called on a controller class that doesn't exist.
 */
class ActionNotFoundException extends \Exception {

    public function __construct($message) {
        parent::__construct($message);
    }
}
