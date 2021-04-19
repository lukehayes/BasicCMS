<?php
namespace Core\Exception;

/**
 * Thrown when an action is called on a controller class that doesn't exist.
 *
 * @package Core
 * @subpackage Exception
 */
class ActionNotFoundException extends \Exception {

    /**
     * Constructor.
     *
     * @param string $action The name of the action that doesn't exist.
     */
    public function __construct(string $action) {
        parent::__construct();
        $this->message = "The action $action does not exists.";
    }
}
