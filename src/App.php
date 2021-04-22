<?php 
namespace Core; 

/**
 * The class acts as a front controller for the
 * basic CMS
 */

class App {
    /**
     * An instance of Core\Router
     *
     * @var $router Core\Router
     */
    private $router = null;

    public function __construct(Router $router) {
        $this->router = $router;
    }

    public function getRouter() : Router {
        return $this->router;
    }

	/**
	 * Application entry point starts here.
	 */
	public function run() {
        $this->router->resolve();
	}
}

