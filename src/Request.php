<?php
namespace Core;

/**
 * Class is simply an object wrapper over $_SERVER global.
 */
class Request
{
    /**
     * Return the $_SERVER['REQUEST_URI'] array value
     *
     * @return string
     */
    public function getRequestUri() : string {
        return $_SERVER['REQUEST_URI'] ?? "/";
    }

    /**
     * Get the REQUEST_METHOD from $_SERVER array
     *
     * @return array
     */
    public function getRequestMethod() : string {
        return  $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Split the current REQUEST_URI into controller
     * and action components
     *
     * @return array
     */
    public function getUriPieces() : array {
        return explode("/", $_SERVER['REQUEST_URI']);
    }

}
