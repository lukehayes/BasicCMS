<?php 
namespace Core; 

/**
 * View class
 */
class View
{
	/**
	 * Name of template to load
	 * @var string | null
	 */
	private $template = null;

	/**
	 * Path to load the templates from
	 * @var string | null
	 */
	private $templatePath = null;

	function __construct( $template ) {
		$this->template = $template;
		$this->templatePath = "templates";
	}

	/**
	 * Get the name of the current view template
	 * @return string Name of the template
	 */
	public function getTemplateString() : string {
		return $this->template;
	}

	/**
	 * Template Path Getter
	 * @return string
	 */
	public function getTemplatePath() : string {
		return $this->templatePath;
	}
}

