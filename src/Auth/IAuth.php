<?php
namespace Core\Auth;

/**
 * IAuth should be implemented but all classes that want to use authentication.
 */
interface IAuth
{
    /**
     * Process the authentication
     */
    public function process() : void;
}
