<?php 
namespace Core;

/**
 * Base Controller that should be inherited
 */
class Controller
{

	/**
	 * View object tied to the controller
	 * @var [type]
	 */
	private $view = null;

	public function __construct() {}

	/**
	 * Load a View into the controller
	 * @param  View   $view The view to load
	 * @return void
	 */
	private function loadView(View $view) {
		$this->view = $view;
	}
}
