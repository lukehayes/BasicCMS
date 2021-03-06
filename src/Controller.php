<?php 
namespace Core;

use Core\View;
use Core\Request;

/**
 * Base Controller that all controllers should inherit from.
 *
 * @package Core
 */
class Controller
{
	/**
	 * View object tied to the controller object.
     *
	 * @var View
	 */
	protected $view = null;

    public function __construct() 
    {
        $this->view = new View();

        // Site wide page variables that need to be
        // available everywhere.
        $this->data = [
            'title' => 'CMS'
        ];
    }

	/**
	 * Load a View instance into the controller class.
     *
	 * @param View $view The view to load
     *
	 * @return void
	 */
	private function loadView(View $view) {
		$this->view = $view;
	}
}
