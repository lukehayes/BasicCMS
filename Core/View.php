<?php 
namespace Core; 

/**
 * View class
 */
class View
{
	private $template = null;
	
	function __construct( $template ) {
		$this->template = $template;
	}

	/**
	 * Get the name of the current view template
	 * @return string Name of the template
	 */
	public function getTemplateString() : string {
		return $this->template;
	}
}

