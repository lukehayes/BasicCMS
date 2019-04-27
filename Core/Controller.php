<?php 
namespace Core;

/**
 * Base Controller that should be inherited
 */
class Controller
{
	public function __construct() {}

	/**
	 * Render a view
	 * @param  $view $view The view to be rendered
	 * @return void
	 */
	public function render( $view ) {
		echo "Render View: " . $view;
	}
}
